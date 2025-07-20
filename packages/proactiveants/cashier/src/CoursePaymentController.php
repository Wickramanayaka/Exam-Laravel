<?php

namespace ProactiveAnts\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Course\Payment;
use Storage;
use ProactiveAnts\Course\Course;
use App\User;
use App\Teacher;
use ProactiveAnts\Cashier\CashierPayment;
use Auth;
use App\Enroll;
use App\Attendance;

class CoursePaymentController extends Controller
{
    public function index(Request $request)
    {
        $payments = Payment::orderBy('status', 'desc')->orderBy('id', 'desc')->paginate(100);
        $courses = Course::where('publish', 1)->get();
        $users = User::where('active', 1)->get();
        $teachers = Teacher::where('active', 1)->get();
        $keyword = '';
        if($request->has('keyword')){
            $payments = Payment::orWhereHas(
                'user', function($query) use($request){
                    return $query->where('name','like','%'.$request->keyword.'%');
                }
            )->orWhereHas(
                'course', function($query) use($request){
                    return $query->where('name','like','%'.$request->keyword.'%');
                }
            )
            ->orWhere('date','like','%'.$request->keyword.'%')
            ->orWhere('amount','like','%'.$request->keyword.'%')
            ->orWhere('method','like','%'.$request->keyword.'%')
            ->paginate(100);
            $keyword = $request->keyword;
        }
        return view('cashier::courses.payment_list', compact('payments','courses', 'users', 'keyword','teachers'));
    }

    public function download($id)
    {
        $pay = Payment::findOrFail($id);
        if(Storage::disk('local')->exists($pay->file_path)){
            return response()->download(storage_path('app/'.$pay->file_path));
        }
        return response('The slip was not found, it might get deleted after 30 days.',404);
        
    }

    public function confirmPayment(Request $request)
    {
        $this->validate($request,[
            'id' => 'required'
        ]);
        $payment = Payment::findOrFail($request->id);
        $payment->status = "PAID";
        $payment->save();
        return redirect()->back();
    }

    public function deletePayment(Request $request)
    {
        $this->validate($request,[
            'id' => 'required'
        ]);
        $payment = Payment::findOrFail($request->id);
        $payment->delete();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required|numeric|exists:co_courses,id',
            'user_id' => 'required',
            'fee' => 'required|numeric',
            'month' => 'required',
            'year' => 'required'
        ]);
        foreach ($request->user_id as $key => $value) {
            $payment = Payment::create([
                'co_course_id' => $request->course_id,
                'user_id' => $value,
                'reg_number' => '1',
                'amount' => $request->fee,
                'date' => now(),
                'status' => 'PAID',
                'method' => $request->method,
                'expiry_date' => date('Y-m-t',strtotime(now())),
                'payment_for_month' => $request->month,
                'payment_for_year' => $request->year,
                'memo' => $request->memo
            ]); 
            // Add payment creator
            CashierPayment::create([
                'co_payment_id' => $payment->id,
                'ca_cashier_id' => Auth::user()->id
            ]);
            // Create enroll
            Enroll::firstOrCreate([
                'co_course_id' => $request->course_id,
                'user_id' => $value
            ],
            [
                'co_course_id' => $request->course_id,
                'user_id' => $value,
                'date' => date('Y-m-t',strtotime(now()))
            ]
            ); 
        }
         
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $payments = Payment::orderBy('id')->where('date','>=', $request->fromdate)->where('date','<=', $request->todate);
        if($request->has('id') && $request->id<>""){
            $payments = $payments->where('id', $request->id);
        }
        if($request->has('amount') && $request->amount<>""){
            $payments = $payments->where('amount', $request->amount);
        }
        if($request->has('status') && $request->status<>"Any"){
            $payments = $payments->where('status', $request->status);
        }
        if($request->has('method') && $request->method<>"Any"){
            $payments = $payments->where('method', $request->method);
        }
        if($request->has('name') && $request->name<>""){
            $payments = $payments->whereHas('user', function($query) use($request){
                $query->where('name','like','%'.$request->name.'%');
            });
        }
        if($request->has('reg_number') && $request->reg_number<>""){
            $payments = $payments->whereHas('user', function($query) use($request){
                $query->where('reg_number','like','%'.$request->reg_number.'%');
            });
        }
        if($request->has('course') && $request->course<>"Any"){
            $payments = $payments->whereHas('course', function($query) use($request){
                $query->where('id',$request->course);
            });
        }
        if($request->has('teacher') && $request->teacher<>"Any"){
            $payments = $payments->whereHas('course', function($query) use($request){
                $query->whereHas('teacher',function($query) use($request){
                    $query->where('id',$request->teacher);
                });
            });
        }
        $payments = $payments->get();
        return (string) view('cashier::courses.partials.payment_data', compact('payments'));
    }

    public function export()
    {
        $payments = Payment::where('status', 'PAID')->get();
        $filename = "payments.csv";
        $headers = array(
            "Content-type"          => "text/csv",
            "Content-Disposition"   => "attachment; filename=$filename",
            "Pragma"                => "no-cache",
            "Cache-Control"         => "must-revalidate, post-check=0, pre-check=0",
            "Expires"               => "0"
        );
        $columns = array("Id","Name", "Course", "Teacher", "Date","Fee","Method");
        $callback = function() use($payments, $columns){
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($payments as $payment) {
                fputcsv($file, array($payment->user->id, $payment->user->name, $payment->course->name, $payment->course->teacher->name, $payment->date,$payment->amount,$payment->method));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    public function quickpay(Request $request)
    {
        $user = new User();
        if($request->has('reg_number')){
            $u = User::where('reg_number', $request->reg_number)->first();
            if(!$u==null){
                $user = $u;
            }
        }
        elseif($request->has('id')){
            $u = User::where('slang', $request->id)->first();
            if(!$u==null){
                $user = $u;
            }
        }
        return view('cashier::quickpay', compact('user'));
    }

    public function pay(Request $request)
    {
        $request->validate([
            'user' => 'required|exists:users,id',
            'course' => 'required|exists:co_courses,id'
        ]);
        $course = Course::findOrFail($request->course);
        $payment = Payment::create([
            'co_course_id' => $course->id,
            'user_id' => $request->user,
            'reg_number' => '1',
            'amount' => $course->fee,
            'date' => now(),
            'status' => 'PAID',
            'method' => 'Offline',
            'expiry_date' => date('Y-m-t',strtotime(now())),
            'payment_for_month' => date('m'),
            'payment_for_year' => date('Y'),
            'memo' => "Paid via quick pay"
        ]); 
        return redirect('cashier/course/quickpay');
    }

    public function checkin(Request $request)
    {
        $request->validate([
            'user' => 'required|exists:users,id',
            'course' => 'required|exists:co_courses,id'
        ]);
        Attendance::create([
            'user_id' => $request->user,
            'co_course_id' => $request->course,
            'check_in' => \Carbon\Carbon::now()
        ]);
        return redirect('cashier/course/quickpay');
    }

}
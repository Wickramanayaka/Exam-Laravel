<?php

namespace ProactiveAnts\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProactiveAnts\Course\Course;
use Config;
use Auth;
use ProactiveAnts\Course\Payment;
use App\Enroll;

class CoursePaymentController extends Controller
{
    public function payment($id)
    {
        if(Auth::check()){
            $course = Course::findOrFail($request->course_id);
            $payment = Payment::create([
                'co_course_id' => $course->id,
                'user_id' => Auth::user()->id,
                'date' => now(),
                'status' => 'UNPAID',
                'amount' => $course->fee,
                'reg_number' => $request->reg_number
            ]);
            // Create enroll
            Enroll::firstOrCreate([
                'co_course_id' => $course->id,
                'user_id' => Auth::user()->id
             ],
             [
                'co_course_id' => $course->id,
                'user_id' => Auth::user()->id,
                'date' => date('Y-m-t',strtotime(now()))
            ]);
            return view('course::ipg_request', compact('payment'));
        }
        return redirect(url('login'));
    }

    public function paymentMethod($id)
    {
        $course = Course::where('publish',1)->where('slang', $id)->firstOrFail();
        // Check whether user has valid payment.
        return view('course::payments.methods', compact('course'));
    }

    public function cards($id)
    {
        $course = Course::where('publish',1)->where('slang', $id)->firstOrFail();
        // Check whether user has valid payment.
        return view('course::payments.cards', compact('course'));
    }

    public function online($id)
    {
        $course = Course::where('publish',1)->where('slang', $id)->firstOrFail();
        // Check whether user has valid payment.
        return view('course::payments.online', compact('course'));
    }

    public function ezcash($id)
    {
        $course = Course::where('publish',1)->where('slang', $id)->firstOrFail();
        // Check whether user has valid payment.
        return view('course::payments.ezcash', compact('course'));
    }

    public function deposit($id)
    {
        $course = Course::where('publish',1)->where('slang', $id)->firstOrFail();
        // Check whether user has valid payment.
        return view('course::payments.deposit', compact('course'));
    }

    public function upload(Request $request)
    {
        if(Auth::check()){
            $this->validate($request, [
                'course_id' => 'required',
                'image' => 'required',
                'method' => 'required',
                'month' => 'required',
                'year' => 'required'
            ]);
            
            // Check for previous upload slip with pending payment
            $pendingPayment = Payment::where('co_course_id', $request->course_id)->where('user_id', Auth::user()->id)->where('status', 'UNPAID')->first();
            if($pendingPayment){
                return redirect()->back()->with(['error' => 'ඔබගේ ගෙවීම තහයුරු කරන තෙක් සිටින්න. ඔබේ ගෙවීම් සක්‍රීය වීම සදහා විනාඩි 10 ත් පැය 4 ත් අතර කාලයක් ගත විය හැකි බව කරුණාවෙන් සළකන්න.']);
            }
            $path = $request->file('image')->store('slips');
            $course = Course::findOrFail($request->course_id);
            Payment::create([
                'co_course_id' => $request->course_id,
                'user_id' => Auth::user()->id,
                'reg_number' => '1',
                'amount' => $course->fee,
                'date' => now(),
                'status' => 'UNPAID',
                'method' => $request->method,
                'expiry_date' => date('Y-m-t',strtotime(now())),
                'file_path' => $path,
                'payment_for_month' => $request->month,
                'payment_for_year' => $request->year
            ]);

            // Create enroll
            Enroll::firstOrCreate([
                    'co_course_id' => $request->course_id,
                    'user_id' => Auth::user()->id
                ],
                [
                    'co_course_id' => $request->course_id,
                    'user_id' => Auth::user()->id,
                    'date' => date('Y-m-t',strtotime(now()))
                ]
            );
            return redirect('/')->with('message', "ඔබේ ගෙවීම් සක්‍රීය වීම සදහා විනාඩි 10 ත් පැය 4 ත් අතර කාලයක් ගත විය හැකි බව කරුණාවෙන් සළකන්න.");
        }
    }

    public function genie($id)
    {
        $course = Course::findOrFail($id);
        $payment = Payment::create([
            'co_course_id' => $id,
            'user_id' => Auth::user()->id,
            'reg_number' => '1',
            'amount' => $course->fee,
            'date' => now(),
            'status' => 'UNPAID',
            'method' => "Cards",
            'expiry_date' => date('Y-m-t',strtotime(now())),
            'file_path' => '',
            'payment_for_month' => date('m'),
            'payment_for_year' => date('Y')
        ]);
         // Create enroll
         Enroll::firstOrCreate([
            'co_course_id' => $id,
            'user_id' => Auth::user()->id
         ],
         [
            'co_course_id' => $id,
            'user_id' => Auth::user()->id,
            'date' => date('Y-m-t',strtotime(now()))
        ]
        );
        return view('course::genie.request', compact('payment'));
    }

    public function history()
    {
        if(Auth::check()){
            $payments = Payment::where('user_id', Auth::user()->id)->where('status', "PAID")->get();
            return view('course::payment_history', compact('payments'));
        }
        return redirect(url('/login'));
    }
}
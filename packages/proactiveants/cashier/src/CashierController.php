<?php

namespace ProactiveAnts\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Image;
use Illuminate\Support\Facades\Response;
use Auth;
use App\User;
use App\Enroll;
use ProactiveAnts\Course\Course;
use App\Attendance;

class CashierController extends Controller
{
    public function index()
    {
        return redirect(url('cashier/course/payment'));
    }

    public function viewPayment(Request $request)
    {
        $user = User::where('slang', $request->id)->firstOrFail();
        return view('cashier::users.payment', compact('user'));

    }

    public function attendance(Request $request)
    {
        $courses = Course::all();
        $attendance = [];
        if($request->has('month')){
            $course = Course::findOrFail($request->course);
            foreach ($course->enrolls as $enroll) {
                $att = Attendance::where('user_id', $enroll->user_id)->where('co_course_id', $request->course)->whereRaw('MONTH(check_in)',$request->month)->whereRaw('YEAR(check_in)', $request->year)->orderBy('check_in')->get();
                $user = User::find($enroll->user_id);
                $attendance[] = [
                    'user' => $user,
                    'course' => $course,
                    'check_in' => $att
                ];
            }
        }
        return view('cashier::attendance', compact('courses', 'attendance'));
    }
}
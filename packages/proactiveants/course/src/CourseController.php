<?php

namespace ProactiveAnts\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProactiveAnts\Course\Course;
use Config;
use App\Teacher;
use ProactiveAnts\Course\Payment;
use Auth;

class CourseController extends Controller
{
    public function index()
    {
        $teachers = Teacher::where('active', 1)->orderBy('rank')->get();
        return view('course::course_list', compact('teachers'));
    }

    public function getCourse($id)
    {
        if(Auth::check()){
            $course = Course::where('publish',1)->where('slang', $id)->firstOrFail();
            // Check whether user has valid payment.
            $payments = Payment::where('co_course_id', $course->id)->where('user_id', Auth::user()->id)->where('status', "PAID")->get();
            foreach ($payments as $key => $payment) {
                // Check expiry date
                $today = \DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $expiry_date = \DateTime::createFromFormat('Y-m-d', $payment->expiry_date);
                if($today <= $expiry_date){
                    $c_videos = CourseVideo::where('co_course_id',$course->id)->where('valid_for_month',date('m'))->where('valid_for_year',date('Y'))->get();
                    return view('course::course_view', compact('course','c_videos'));
                }
            }
            return view('course::payments.payment', compact('course'));
        }
        return redirect(url('/login'));


    }
}
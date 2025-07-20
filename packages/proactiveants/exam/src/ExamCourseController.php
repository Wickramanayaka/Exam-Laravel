<?php

namespace ProactiveAnts\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProactiveAnts\Exam\Category;
use ProactiveAnts\Exam\ExamPaperSet;
use ProactiveAnts\Course\Course;
use ProactiveAnts\Course\Payment;
use Auth;

class ExamCourseController extends Controller
{
    public function view($id)
    {
        if(!Auth::check()){
            return redirect('login');
        }
        $course = Course::where('id', $id)->firstOrFail();
        // Check payment 
        $payment = Payment::where('co_course_id', $id)
                ->where('user_id', Auth::user()->id)
                ->where('status', "PAID")
                ->where('payment_for_month',date('m'))
                ->where('payment_for_year', date('Y'))
                ->first();
        if($payment==null){
            // Free papers only
            $papers = ExamPaper::where('co_course_id',$id)->where('is_free',1)->get();
            return view('exam::course_paper_view', compact('papers','course'));
        }
        $papers = ExamPaper::where('co_course_id',$id)->get();
        return view('exam::course_paper_view', compact('papers','course'));
    }
}

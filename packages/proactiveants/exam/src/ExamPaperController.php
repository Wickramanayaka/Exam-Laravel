<?php

namespace ProactiveAnts\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProactiveAnts\Exam\Category;
use ProactiveAnts\Exam\ExamPaper;
use ProactiveAnts\Exam\ExamPaperSet;
use ProactiveAnts\Exam\Tryout;
use Auth;
use DateTime;
use ProactiveAnts\Course\Course;
use ProactiveAnts\Course\Payment;


class ExamPaperController extends Controller
{
    public function view($c,$id)
    {
        $course = Course::where('id', $c)->firstOrFail();
        $paper = ExamPaper::where('id', $id)->where('published',1)->firstOrFail();
        if($paper->is_free==0){
            if($this->checkPayment($c)){
                return view('exam::paper_view', compact('paper','course'));
            }
            else{
                return redirect('course/'.$course->slang);
            }
        }
        else{
            return view('exam::paper_view', compact('paper','course'));
        }
        
    }

    public function begin($c,$id)
    {
        $course = Course::where('id', $c)->firstOrFail();
        $paper = ExamPaper::where('id', $id)->where('published',1)->firstOrFail();
        if($paper->is_free==0){
            if(!$this->checkPayment($c)){
                return redirect('course/'.$course->slang);
            }
        }
        // Record tryout
        if(Auth::check()){
            // Close all un-ended tryouts
            // This make only one user can access paper at a given time
            $tryouts = Tryout::where('user_id', Auth::user()->id)->get();
            foreach ($tryouts as $key => $value) {
                $value->end_at = now();
                $value->save();
            }
            $tryout = Tryout::create([
                'user_id' => Auth::user()->id,
                'ex_exam_paper_id' => $paper->id,
                'start_at' => now()
            ]);
        }
        else{
            return redirect('/login');
        }

        return view('exam::paper_begin', compact('paper','course','tryout'));
    }

    private function checkPayment($id)
    {
        $payment = Payment::where('co_course_id', $id)
        ->where('user_id', Auth::user()->id)
        ->where('status', "PAID")
        ->where('payment_for_month',date('m'))
        ->where('payment_for_year', date('Y'))
        ->first();
        if(!$payment==null){
            return true;
        }
        return false;
    }

    public function submit(Request $request)
    {
        $this->validate($request, [
            'paper_id' => 'required'
        ]);
        $tryout = Tryout::where('user_id', Auth::user()->id)->where('ex_exam_paper_id', $request->paper_id)->orderBy('id', 'desc')->firstOrFail();
        if($tryout->end_at==null){
            $tryout->end_at = now();
            $tryout->save();
        }
        return (string) view('exam::partials.paper_result', compact('tryout'));
    }

    public function complete(Request $request)
    {
        $this->validate($request, [
            'paper_id' => 'required'
        ]);
        $paper = ExamPaper::findOrFail($request->paper_id);
        $tryouts = Tryout::where('user_id', Auth::user()->id)->where('ex_exam_paper_id', $request->paper_id)->where('end_at','<>','null')->orderBy('id')->get();
        return (string) view('exam::partials.paper_complete', compact('tryouts', 'paper'));
    }

    public function viewPaperMark(Request $request)
    {
        $this->validate($request, [
            'paper_id' => 'required'
        ]);
        $paper = ExamPaper::findOrFail($request->paper_id);
        $tryouts = Tryout::where('user_id', Auth::user()->id)->where('ex_exam_paper_id', $request->paper_id)->where('end_at','<>','null')->orderBy('id')->get();
        if($tryouts->count()==0){
            return redirect()->back()->with("error","ඔබ තවමත් මෙම ප්‍රශ්න පත්‍රය උත්සාහ කර නැත.");
        }
        return (string) view('exam::paper_view_mark', compact('tryouts', 'paper'));
    }

    public function review(Request $request)
    {
        $this->validate($request, [
            'tryout_id' => 'required',

        ]);
        $tryout = Tryout::where('user_id', Auth::user()->id)->where('id', $request->tryout_id)->orderBy('id', 'desc')->firstOrFail();
        return (string) view('exam::partials.paper_review', compact('tryout'));
    }

    public function updatetime(Request $request)
    {
        $this->validate($request, [
            'tryout_id' => 'required',
            'paper_id' => 'required'

        ]);
        $tryout = Tryout::where('user_id', Auth::user()->id)->where('id', $request->tryout_id)->firstOrFail();
        $paper = ExamPaper::findOrFail($request->paper_id);
        $total_time = $paper->questions->sum('pivot.duration');
        $start_at = new DateTime($tryout->start_at);
        $time_available = $start_at->add(new \DateInterval('PT' .$total_time. 'M'));
        $time_available = strtotime($time_available->format('Y-m-d H:i:s'));
        $now = strtotime(now());
        $time_left = $time_available - $now;
        if($time_left <= 0){
            return 0;
        }
        $hours = floor($time_left / 3600);
        $minutes = floor(($time_left / 60)%60);
        $seconds = $time_left % 60;
        return "පැය " .$hours. " මිනිත්තු " . $minutes . " තත්පර " .$seconds. " ඉතිරිව ඇත";
    }

}

<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GradeSubject;
use ProactiveAnts\Exam\ExamPaper;
use ProactiveAnts\Exam\Question;
use ProactiveAnts\Exam\Answer;
use ProactiveAnts\Exam\ExamPaperQuestion;
use Config;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $questions = Question::all(); 
        return view('admin::exams.index_question', compact('questions'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
            'co_course_id' => 'required',
            'paper_id' => 'required'
        ]);
        $q = Question::create([
            'question' => $request->question,
            'co_course_id' => $request->co_course_id,
        ]);
        foreach ($request->answer as $key => $value) {
            $a = Answer::create([
                'ex_question_id' => $q->id,
                'answer' => $value,
                'is_correct' => $key+1==$request->correct?1:0,
                'answer_number' => $key + 1
            ]);
        }
        // Get last question number
        $p = ExamPaper::findOrFail($request->paper_id);
        $max = $p->questions->max('pivot.question_number') + 1;
        // Add question to the paper
        ExamPaperQuestion::create([
            'question_number' => $max,
            'ex_exam_paper_id' => $request->paper_id,
            'ex_question_id' => $q->id,
            'duration' => Config::get('admin.default_question_duration'), 
            'mark' => Config::get('admin.default_question_mark')
        ]);
        return redirect(url('/adm/ex/paper/').'/'.$request->paper_id.'/view');
    }

    public function ajaxList(Request $request)
    {
        $questions = Question::all(); 
        return (string) view('admin::exams.partials.question_ajax', compact('questions'));
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $q = Question::findOrFail($request->id);
        $q->delete();
        return redirect()->back();
    }

    
}
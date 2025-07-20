<?php

namespace ProactiveAnts\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProactiveAnts\Exam\ExamPaper;
use ProactiveAnts\Exam\UserAnswer;
use Auth;
use ProactiveAnts\Exam\ExamPaperQuestion;

class QuestionController extends Controller
{
    public function getQuestion(Request $request)
    {
        $this->validate($request, [
            'paper_id'=> 'required',
            'question_number' => 'required'
        ]);
        $paper = ExamPaper::findOrFail($request->paper_id);
        $question = $paper->questions->where('pivot.question_number', $request->question_number)->first();
        $count = $paper->questions->count('id');
        // Get user answer if exists
        // Get existing tryout
        $tryout = Tryout::where('ex_exam_paper_id', $paper->id)->where('user_id', Auth::user()->id)->whereNull('end_at')->first();
        $user_answer = UserAnswer::where('ex_tryout_id', $tryout->id)->where('ex_question_id',$question->id)->first();    
        return (string) view('exam::partials.question_view_ajax', compact('question','count','user_answer'));
    }

    public function postAnswer(Request $request)
    {
        $paper = ExamPaper::findOrFail($request->paper_id);
        $paper_question = ExamPaperQuestion::where('ex_exam_paper_id', $paper->id)->where('question_number',$request->question_number)->firstOrFail(); 
        //dd($paper_question);
        $question = Question::findOrFail($paper_question->ex_question_id);
        if(Auth::check()){
            // Get existing tryout
            $tryout = Tryout::where('ex_exam_paper_id', $paper->id)->where('user_id', Auth::user()->id)->whereNull('end_at')->first();
            if($tryout==null){
                // can not find tryout create new one
                $tryout = Tryout::create([
                    'user_id' => Auth::user()->id,
                    'ex_exam_paper_id' => $paper->id,
                    'start_at' => now()
                ]);
            }
            // Get correct answer
            $answer = Answer::findOrFail($request->answer);
            // Record the answer
            // Check existing answer
            $user_answer = UserAnswer::where('ex_tryout_id', $tryout->id)->where('ex_question_id',$question->id)->first();
            if($user_answer==null){
                UserAnswer::create([
                    'ex_tryout_id' => $tryout->id,
                    'ex_question_id' => $question->id,
                    'ex_answer_id' => $request->answer,
                    'is_correct' => $answer->is_correct,
                    'mark' => $answer->is_correct==1?$paper_question->mark:0
                ]);
            }
            else{
                $user_answer->ex_answer_id = $request->answer;
                $user_answer->is_correct = $answer->is_correct;
                $user_answer->mark = $answer->is_correct==1?$paper_question->mark:0;
                $user_answer->save();
            }

            return 'OK';
        }
        else{
            return redirect('/login');
        }

    }
}

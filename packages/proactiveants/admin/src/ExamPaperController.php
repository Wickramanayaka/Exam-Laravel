<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GradeSubject;
use ProactiveAnts\Exam\ExamPaper;
use ProactiveAnts\Exam\Question;
use ProactiveAnts\Exam\ExamPaperQuestion;
use ProactiveAnts\Course\Course;
use Config;

class ExamPaperController extends Controller
{
    public function index(Request $request)
    {
        $keyword = '';
        $courses = Course::all();
        $papers = ExamPaper::paginate(50);
        if($request->has('keyword')){
            $papers = ExamPaper::where('name','like','%'.$request->keyword.'%')->paginate(50);
            $keyword = $request->keyword;
        }
        return view('admin::exams.index_paper', compact('courses', 'papers','keyword'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'co_course_id' => 'required',
            'slang' => 'required|unique:ex_exam_papers,slang|alpha_dash'
        ]);
        $data = $request->all();
        $data['published'] = 0;
        if($request->has('is_free')){
            $data['is_free'] = 1;
        }
        ExamPaper::create($data);
        return redirect()->back();
    }

    private function generateSlang(String $str){
        return preg_replace('/[[:space:]]+/','-',$str);
    }

    public function delete(Request $request)
    {
        $examp = ExamPaper::findOrFail($request->id);
        $examp->delete();
        return redirect()->back();
    }

    public function view($id)
    {
        $paper = ExamPaper::with(['questions' => function($q){$q->orderBy('question_number','asc');}])->findOrFail($id);
        return view('admin::exams.view_paper', compact('paper'));
    }

    public function addQuestion($id)
    {
        $paper = ExamPaper::findOrFail($id);
        return view('admin::exams.add_question_to_paper', compact('paper'));
    }

    public function addToPaper(Request $request)
    {
        $this->validate($request, [
            'paper_id' => 'required',
            'question_id' => 'required'
        ]);
        // Get last question number
        $p = ExamPaper::findOrFail($request->paper_id);
        $q = Question::findOrFail($request->question_id);
        $max = $p->questions->max('pivot.question_number') + 1;
        // Add question to the paper
        ExamPaperQuestion::create([
            'question_number' => $max,
            'ex_exam_paper_id' => $request->paper_id,
            'ex_question_id' => $q->id,
            'duration' => Config::get('admin.default_question_duration'), 
            'mark' => Config::get('admin.default_question_mark')
        ]);
        return "ok";
    }

    public function removeQuestionFromPaper(Request $request)
    {
        // Id, which is id in exam_paper_questions table
        $this->validate($request, [
            'id' => 'required'
        ]);
        $exam_paper_q = ExamPaperQuestion::findOrFail($request->id);
        $deleting_question_number = $exam_paper_q->question_number;
        $paper_id = $exam_paper_q->ex_exam_paper_id;
        $exam_paper_q->delete();
        // Recalculate the question number
        $existing_questions = ExamPaperQuestion::where('ex_exam_paper_id',$paper_id)->get();
        foreach ($existing_questions as $key => $question) {
            if($question->question_number > $deleting_question_number){
                $question->question_number -= 1;
                $question->save();
            }
        }
        return redirect()->back();
    }

    public function up($id)
    {
        $paper_question = ExamPaperQuestion::findOrFail($id);
        $question_number_one_up = $paper_question->question_number - 1;
        //dd($paper_question);
        $paper_question_one_up = ExamPaperQuestion::where('ex_exam_paper_id',$paper_question->ex_exam_paper_id)
        ->where('question_number',$question_number_one_up)->first();
        //dd($paper_question_one_up);
        if($paper_question_one_up==null){
            // this is the question one. nothing do here.
        }
        else{
            $paper_question->question_number -= 1;
            $paper_question_one_up->question_number += 1;
            $paper_question->save();
            $paper_question_one_up->save();
        }      
        return redirect()->back();

    }

    public function down($id)
    {
        $paper_question = ExamPaperQuestion::findOrFail($id);
        $question_number_one_down = $paper_question->question_number + 1;
        //dd($paper_question);
        $paper_question_one_down = ExamPaperQuestion::where('ex_exam_paper_id',$paper_question->ex_exam_paper_id)
        ->where('question_number',$question_number_one_down)->first();
        //dd($paper_question_one_down);
        if($paper_question_one_down==null){
            // this is the question one. nothing do here.
        }
        else{
            $paper_question->question_number += 1;
            $paper_question_one_down->question_number -= 1;
            $paper_question->save();
            $paper_question_one_down->save();
        }      
        return redirect()->back();
    }

    public function edit($id)
    {
        $paper = ExamPaper::findOrFail($id);
        return view('admin::exams.edit_paper', compact('paper'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'slang' => 'required|alpha_dash'
        ]);
        $paper = ExamPaper::findOrFail($request->id);
        $paper->name = $request->name;
        $paper->slang = $request->slang;
        $paper->save();
        return redirect(url('/adm/ex/paper'));
    }

    public function updateQuestion(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'question_number' => 'required',
            'duration' => 'required',
            'mark' => 'required'
        ]);
        for ($i=0; $i < count($request->id); $i++) { 
            $paperQuestion = ExamPaperQuestion::findOrFail($request->id[$i]);
            $paperQuestion->question_number = $request->question_number[$i];
            $paperQuestion->duration = $request->duration[$i];
            $paperQuestion->mark = $request->mark[$i];
            $paperQuestion->save();
        }
        return redirect()->back();
    }

    public function publish($id)
    {
        $paper = ExamPaper::findOrFail($id);
        $paper->published = 1 - $paper->published ;
        $paper->save();
        return redirect()->back(); 
    }
}

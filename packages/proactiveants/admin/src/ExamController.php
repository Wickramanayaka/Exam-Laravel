<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Grade;
use ProactiveAnts\Exam\ExamPaper;
use ProactiveAnts\Exam\ExamPaperSet;
use ProactiveAnts\Exam\ExamPaperSetPaper;
use ProactiveAnts\Exam\Category;

class ExamController extends Controller
{
    public function index()
    {
        $sets = ExamPaperSet::get();
        $papers = ExamPaper::where('published', 1)->get();
        $grades = Grade::all();
        $categories = Category::all();
        return view('admin::exams.index',compact('papers', 'grades','sets','categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'paper_id' => 'required',
            'grade_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'ex_category_id' => 'required'
        ]);
        $data = $request->all();
        $data['published'] = 1;
        $exam_paper_set = ExamPaperSet::create($data);
        // Add record to ex_exam_paper_set_paper
        foreach ($request->paper_id as $key => $id) {
            $paper = ExamPaper::findOrFail($id);
            ExamPaperSetPaper::create([
                'ex_exam_paper_id' => $paper->id, 
                'ex_exam_paper_set_id' => $exam_paper_set->id
            ]);
        }
        return redirect()->back();

    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $set = ExamPaperSet::findOrFail($request->id);
        $set->delete();
        return redirect()->back();
    }

}

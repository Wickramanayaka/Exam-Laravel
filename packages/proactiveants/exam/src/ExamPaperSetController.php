<?php

namespace ProactiveAnts\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProactiveAnts\Exam\Category;
use ProactiveAnts\Exam\ExamPaperSet;

class ExamPaperSetController extends Controller
{
    // public function view($id)
    // {
    //     $category = Category::where('slang', $id)->firstOrFail();
    //     $sets = ExamPaperSet::where('ex_category_id',$category->id)->get();
    //     return view('exam::grade_paper_set_view', compact('sets','category'));
    // }
}

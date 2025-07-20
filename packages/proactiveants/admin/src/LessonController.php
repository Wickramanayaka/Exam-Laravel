<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;
use Illuminate\Support\Facades\Response;
use Image;
use App\Teacher;
use App\Subject;
use App\Grade;
use App\GradeSubject;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        $units = Unit::orderBy('subject_id')->orderBy('grade_id')->orderBy('number')->paginate(50);
        $keyword = '';
        if($request->has('keyword')){
            $units = Unit::where('name','like','%'.$request->keyword.'%')
            ->paginate(50);
            $keyword = $request->keyword;
        }
        $grades = Grade::all();
        $subjects = Subject::all();
        return view('admin::lesson.index', compact('units','subjects','grades','keyword'));
    }

    public function viewLesson($id)
    {
        $unit = Unit::findOrFail($id);
        $teachers = Teacher::all();
        return view('admin::lesson.viewLesson', compact('unit', 'teachers'));
    }

    public function deleteLesson(Request $request)
    {
        /**
         * TBD
         * Need implement whether the user has purchased any of this lesson
         * the delete is not permitted
         */
        $request->validate([
            'id' => 'required'
        ]);
        $unit = Unit::findOrFail($request->id);
        $unit->delete();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|numeric',
            'name' => 'required',
            'slang' => 'required|unique:units,slang|alpha_dash'
        ]);
        $data = $request->all();
        $data['slang'] = $request->slang;
        $data['term_id'] = 1;
        $data['language_id'] = 1;
        // Get Grade subject
        // $gs = GradeSubject::where('subject_id', $data['subject_id'])->where('grade_id', $data['grade_id'])->firstOrFail();
        $data['grade_subject_id'] = 1;
        Unit::create($data);
        return redirect()->back();
    }

    private function generateSlang(String $str){
        return preg_replace('/[[:space:]]+/','-',$str);
    }

}
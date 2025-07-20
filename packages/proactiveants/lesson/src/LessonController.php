<?php

namespace ProactiveAnts\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Subject;
use App\Grade;
use App\GradeSubject;
use App\Unit;
use ProactiveAnts\Lesson\Video;
use ProactiveAnts\Lesson\View;

class LessonController extends Controller
{
    public function getUnit($id)
    {
        $grade_subject = GradeSubject::where('slang',$id)->firstOrFail();
        $units = Unit::where('grade_subject_id',$grade_subject->id)->get();
        if(count($units)>0){
            return view('lesson::index', compact('units','grade_subject'));
        }
        else{
            return redirect()->back();
        }
        
    }
}

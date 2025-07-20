<?php

namespace ProactiveAnts\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Teacher;
use Image;
use Response;

class TeacherController extends Controller
{
    public function fetchImage($id)
    {
        $teacher = Teacher::findOrFail($id);
        $image_file = Image::make($teacher->image);
        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }

    public function getCourseByTeacher($id)
    {
        $teacher = Teacher::where('slang', $id)->where('active', 1)->firstOrFail();
        return view('course::teacher_courses', compact('teacher'));
    }
}
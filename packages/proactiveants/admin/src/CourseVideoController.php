<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;
use Illuminate\Support\Facades\Response;
use Image;
use App\Teacher;
use ProactiveAnts\Lesson\Video;
use ProactiveAnts\Course\CourseVideo;

class CourseVideoController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'id' => 'required|exists:co_courses,id',
            'video' => 'required',
            'date' => 'required'
        ]);
        CourseVideo::create([
            'co_course_id' => $request->id,
            'lsn_video_id' => $request->video, 
            'valid_for_month' => date('m', strtotime($request->date)), 
            'valid_for_year' => date('Y', strtotime($request->date)),
            'date' => $request->date
        ]);
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $video = CourseVideo::findOrFail($request->id);
        $video->delete();
        return redirect()->back();
    }
}

<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;
use Illuminate\Support\Facades\Response;
use Image;
use App\Teacher;
use ProactiveAnts\Lesson\Video;

class VideoController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'unit_id' => 'required',
            'name' => 'required',
            'url' => 'required',
            'sequence' => 'required',
            'teacher_id' => 'required',
            'slang' => 'required|unique:lsn_videos,slang|alpha_dash'
        ]);
        $data = $request->all();
        if($request->has('free')){
            $data['free']=1;
        }
        $data['slang'] = $request->slang;
        Video::create($data);
        return redirect()->back();
    }

    private function generateSlang(String $str){
        return preg_replace('/[[:space:]]+/','-',$str);
    }

    public function delete(Request $request)
    {
        /**
         * TBD
         * Need to implement whether the user has purchased any of this lesson
         * the delete is not permitted
         */
        $request->validate([
            'id' => 'required'
        ]);
        $video = Video::findOrFail($request->id);
        $video->delete();
        return redirect()->back();
    }

    public function publish($id)
    {
        $video = Video::findOrFail($id);
        $currentValue = $video->published=="No"?0:1;
        $video->published = 1 - intval($currentValue);
        $video->save();
        return redirect()->back();
    }
}
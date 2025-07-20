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
use ProactiveAnts\Lesson\SubscriptionVideo;
use Auth;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getVideo($video)
    {
        $user = Auth::user();
        if($user==null){
            return redirect(url('/login#container'));
        }

        $video = Video::where('slang', $video)->firstOrFail();
        $unit = $video->unit;
        $grade_subject = $unit->gradeSubject;
        $units = Unit::where('grade_subject_id',$grade_subject->id)->get();
        // Free video
        if($video->free==1){
            //dd($video);
            // Update view count
            $view = View::where('lsn_video_id', $video->id)->first();
            if($view==null){
                // Add new record with count 1
                View::create([
                    'lsn_video_id' => $video->id,
                    'count' => 1
                ]);
            }
            else{
                $view->count += 1;
                $view->save();
            }
            return view('lesson::index', compact('grade_subject','unit','video','units'));
        }
        // Check subscription
        $subs = Subscription::where('user_id', $user->id)->where('status', 'ACTIVE')->get();
        foreach ($subs as $sub) {
            $sv = SubscriptionVideo::where('lsn_video_id', $video->id)->where('lsn_subscription_id', $sub->id)->first();
            if(!$sv==null){
                // Update view count
                $view = View::where('lsn_video_id', $video->id)->first();
                if($view==null){
                    // Add new record with count 1
                    View::create([
                        'lsn_video_id' => $video->id,
                        'count' => 1
                    ]);
                }
                else{
                    $view->count += 1;
                    $view->save();
                }
                return view('lesson::index', compact('grade_subject','unit','video','units'));
            }
        }
        // No subscription was found ask to purchase.  
        return redirect()->back()->with('purchse_required',"මෙම වීඩියෝව වාදනය කිරීමට පෙර මිලදී ගත යුතුය.");      
    }
}
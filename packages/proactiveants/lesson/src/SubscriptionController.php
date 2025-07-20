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
use ProactiveAnts\Lesson\Sunscription;
use ProactiveAnts\Lesson\SunscriptionVideo;
use Auth;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * This will add record to subscription table
     * Once the payment done in notification call will update subscription to ACTIVE
     * and add record to subscription_videos table
     */
    public function buy($id)
    {
        $user = Auth::user();
        if($user==null){
            return redirect('/login');
        }
        $gs = GradeSubject::where('slang', $id)->firstOrFail();
        $units = Unit::where('grade_subject_id',$gs->id)->get();
        $amount = 0;
        // Subscription amount is based on the unit price not video price.
        $amount = $units->sum('price');
        $subscription = Subscription::create([
            'grade_subject_id' => $gs->id,
            'user_id' => $user->id,
            'date' => now(),
            'status' => 'UNPAID',
            'amount' => $amount,
            'ipg_payment_id' => ''
        ]);
        return view('lesson::ipg_request', compact('subscription'));
    }

    public function history()
    {
        $user = Auth::user();
        $subs = Subscription::whereIn('status',['ACTIVE','INACTIVE'])->where('user_id', $user->id)->get();
        return view('lesson::user_subscription_list', compact('subs'));
    }
}
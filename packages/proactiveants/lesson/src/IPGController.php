<?php

namespace ProactiveAnts\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Lesson\Video;
use ProactiveAnts\Lesson\Subscription;
use ProactiveAnts\Lesson\SubscriptionVideo;
use App\Mail\SubscriptionPaid;
use Log;
use Mail;

class IPGController extends Controller
{
    public function return(Request $request)
    {
        return view('lesson::complete');
    }

    public function notify(Request $request)
    {
        $request->validate([
            'merchant_id' => 'required',
            'order_id' => 'required',
            'payhere_amount' => 'required',
            'payhere_currency' => 'required',
            'status_code' => 'required',
            'md5sig' => 'required'
        ]);
        $local_md5sig = strtoupper (md5 ( $request->merchant_id . $request->order_id . $request->payhere_amount . $request->payhere_currency . $request->status_code . strtoupper(md5(config('store.secret'))) ) );
        if(($local_md5sig === $request->md5sig)AND($request->status_code==2)){
            $s = Subscription::findOrFail($request->order_id);
            $s->status = "ACTIVE";
            $s->ipg_payment_id = $request->payment_id;
            // Add videos into subscription
            foreach ($s->gradeSubject->units as $unit) {
                foreach ($unit->videos as $video) {
                    SubscriptionVideo::create([
                        'lsn_subscription_id' => $s->id,
                        'lsn_video_id' => $video->id,
                    ]);
                }
            }
            $s->save();
            Mail::to($s->user->email)->queue(new SubscriptionPaid($s));
            Log::debug("Mail sent");
        }
        else{
            return view('lsn::ipg_error');
        }
    }

    public function cancel(Type $var = null)
    {
        return view('lsn::ipg_cancel');
    }
}
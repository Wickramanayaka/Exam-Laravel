<?php

namespace ProactiveAnts\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Mail\CoursePurchased;
use Log;
use Mail;
use ProactiveAnts\Course\Payment;
use ProactiveAnts\Course\Course;

class IPGController extends Controller
{
    public function return(Request $request)
    {
        return view('course::complete');
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
            $p = Payment::findOrFail($request->order_id);
            $p->status = "PAID";
            $p->ipg_payment_id = $request->payment_id;
            $p->save();
            Mail::to($p->user->email)->queue(new CoursePurchased($p));
            Log::debug("Mail sent");
        }
        else{
            return view('course::ipg_error');
        }
    }

    public function cancel(Type $var = null)
    {
        return view('course::ipg_cancel');
    }
}
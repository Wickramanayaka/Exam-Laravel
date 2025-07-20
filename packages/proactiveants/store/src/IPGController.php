<?php

namespace ProactiveAnts\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Store\Order;
use ProactiveAnts\Store\Payment;
use App\Mail\OrderCompleted;
use Log;
use Mail;

class IPGController extends Controller
{
    public function return(Request $request)
    {
        return view('store::complete');
    }

    public function notify(Request $request)
    {
        Log::debug('Notify called');
        $request->validate([
            'merchant_id' => 'required',
            'order_id' => 'required',
            'payhere_amount' => 'required',
            'payhere_currency' => 'required',
            'status_code' => 'required',
            'md5sig' => 'required'
        ]);
        Log::debug("Form validated");
        $local_md5sig = strtoupper (md5 ( $request->merchant_id . $request->order_id . $request->payhere_amount . $request->payhere_currency . $request->status_code . strtoupper(md5(config('store.secret'))) ) );
        if(($local_md5sig === $request->md5sig)AND($request->status_code==2)){
            Log::debug("Token validated");
            $order = Order::findOrFail($request->order_id);
            $order->status = "PAID";
            $order->save();
            // Make payment information
            Payment::create([
                'store_order_id' => $order->id,
                'date' => now(),
                'amount' => $request->payhere_amount,
                'ipg_payment_id' => $request->payment_id
            ]);
            Log::debug("Payment created");
            Mail::to($order->user->email)->queue(new OrderCompleted($order));
            Log::debug("Mail sent");
        }
        else{
            Log::debug("Error");
            //return view('store::ipg_error');
        }
    }

    public function cancel(Type $var = null)
    {
        return view('store::ipg_cancel');
    }
}
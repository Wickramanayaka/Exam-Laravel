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

class GenieController extends Controller
{
    public function ipgSuccess(Request $request)
    {
        $validatedData = $request->validate([
            'invoice_number' => 'required',
            'charge_total' => 'required',
            'trx_ref_number' => 'required',
            'trx_date_time' => 'required',
            'message' => 'required',
            'code' => 'required',
            'status' => 'required',
            'txn_token' => 'required'
        ]);
        // Validate the resp token
        $token =config('course.secretCode').$request->code.$request->charge_total.config('course.currency').$request->trx_date_time.$request->trx_ref_number.$request->invoice_number.config('course.storeName');
        $token = hash('sha256', $token);
        if($token==$request->txn_token){
            // Get id from invoice
            $id = substr($request->invoice_number, strpos($request->invoice_number,"_")+1);
            $payment = Payment::findOrFail($id);
            $payment->status = "PAID";
            $payment->save();
            // Send email
            // Mail::to($payment->user->email)->queue(new CoursePurchased($payment));
            // Log::debug("Mail sent");
            return view('course::complete', compact('payment'));
        }
        else{
            abort(401);
        }
    }

    public function ipgError(Request $request)
    {
        return view('course::genie.error');
    }
}
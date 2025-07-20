<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\SmsMessage;
use App\User;
use App\SMSMSL;

class SMSController extends Controller
{
    public function index(Request $request)
    {
        $messages = SmsMessage::orderBy('id', 'desc')->paginate(100);
        $users = User::get();
        $keyword = '';
        if($request->has('keyword')){
            $messages = SmsMessage::where('message','like','%'.$request->keyword.'%')
            ->orderBy('id', 'desc')
            ->paginate(100);
            $keyword = $request->keyword;
        }
        return view('admin::sms', compact('messages', 'keyword', 'users'));
    }

    public function send(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'user_id' => 'required',
            'message' => 'required'
        ]);
        
        foreach ($request->user_id as $id) {
            $user = User::find($id);
            if(!$user==null){
                // Create a record
                SmsMessage::create([
                    'message' => $request->message,
                    'user_id' => $id
                ]);
                // Send SMS
                $client = new SMSMSL($user->telephone, $request->message);
                $client->send();
            }

        }
        return redirect()->back()->with('message', 'The sms has been send successfully.');
    }
}
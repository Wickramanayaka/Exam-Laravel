<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'message' => 'required'
        ]);
        $contact = Contact::create($request->all());
        Mail::send('contact_email',['contact' => $contact],function($message) use($request){
            $message->to(config('app.contact_form_email'));
            $message->subject('Contact Form');
        });
        return back()->with('message','Thank you for contact us.');

    }
}

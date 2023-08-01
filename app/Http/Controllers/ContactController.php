<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {

        /* 
        'firstname' => ['required', 'string', 'max:255', 'regex:/^(?![0-9])[A-Za-z\s]+$/'],
        */

        $sdata = $request->validate([
            'firstname' => ['required',  'string', 'max:255', 'regex:/^(?![0-9])[A-Za-z\s]+$/'],
            'lastname' => ['required',  'string', 'max:255', 'regex:/^(?![0-9])[A-Za-z\s]+$/'],
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = $request->only(['firstname', 'lastname', 'email', 'subject']);

        $data['mailmessage'] = $request -> message;
        
        Mail::send('email.info', $data, function($message){
            $message->to('alishastha892@gmail.com')->subject('New Contact');
        });
        
        Contact::create($sdata);
    
        return redirect()->back()->with('success', 'Thank you for your submission!');
    }
}

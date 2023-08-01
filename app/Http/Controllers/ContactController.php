<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $sdata = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data=[
            'firstname'=>$request->firstname,
            'lastname' =>$request->lastname,
            'mailmessage'=>$request->message,
            'email' => $request->email,
            'subject' => $request->subject,
        ];
        Mail::send('email.info', $data, function($message){
            $message->to('alishastha892@gmail.com')->subject('New Contact');

        });
        Contact::create($sdata);

        // Optionally, you can add a success message or redirect the user to a thank-you page.
        return redirect()->back()->with('success', 'Thank you for your submission!');
    }
}

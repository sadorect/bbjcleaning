<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /// Start Sent Email 
    public function sendContact(Request $request)
    {

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'email' => $request->email,
            'message' => $request->message,
        ];
    
        Mail::to('sadorect@gmail.com')->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
   
    /// End Sent Email 
}

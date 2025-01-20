<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use App\Mail\ContactReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewContactSubmission;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }
    public function store(Request $request)
    { //dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'service' => 'required|string',
            'message' => 'required|string'
        ]);

        Contact::create($validated);
        Notification::route('mail', config('mail.from.address'))
        ->notify(new NewContactSubmission($validated)); 
        
        return redirect()->back()->with('success', 'Thank you for your message. We will contact you shortly.');
    }

    public function reply(Request $request, Contact $contact)
{
    $validated = $request->validate([
        'subject' => 'required|string|max:255',
        'reply_message' => 'required|string'
    ]);

    Mail::to($contact->email)->send(new ContactReply($contact, $validated));

    return redirect()->back()->with('success', 'Reply sent successfully');
}

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully');
    }
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

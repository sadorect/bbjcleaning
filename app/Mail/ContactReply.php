<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReply extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $replyMessage;
    public $subject;

    public function __construct(Contact $contact, array $validated)
    {
        $this->contact = $contact;
        $this->replyMessage = $validated['reply_message'];
        $this->subject = $validated['subject'];
    }

    public function build()
    {
        return $this->markdown('emails.contact-reply')
                    ->subject($this->subject);
    }
}

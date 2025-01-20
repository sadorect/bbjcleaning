<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class ApplicationStatusUpdate extends Mailable
{
    public $application;
    public $message;

    public function __construct($application, $message)
    {
        $this->application = $application;
        $this->message = $message;
    }

    public function build()
    {
        return $this->markdown('emails.application-status')
                    ->subject('Update on Your Job Application - Brightbell');
    }
}

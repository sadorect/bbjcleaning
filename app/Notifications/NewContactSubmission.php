<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewContactSubmission extends Notification
{
    protected $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Contact Form Submission')
            ->line('New contact form submission from: ' . $this->contact->name)
            ->line('Email: ' . $this->contact->email)
            ->line('Phone: ' . $this->contact->phone)
            ->line('Service: ' . $this->contact->service)
            ->line('Message: ' . $this->contact->message)
            ->action('View in Admin Panel', url('/admin/contacts'));
    }
}

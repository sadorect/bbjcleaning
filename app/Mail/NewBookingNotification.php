<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class NewBookingNotification extends Mailable
{
    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->markdown('emails.admin.new-booking')
                    ->subject('New Booking Request - ' . $this->booking->booking_number);
    }
}

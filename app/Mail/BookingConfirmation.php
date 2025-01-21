<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class BookingConfirmation extends Mailable
{
    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->markdown('emails.booking-confirmation')
                    ->subject('Booking Confirmation - ' . $this->booking->booking_number);
    }
}

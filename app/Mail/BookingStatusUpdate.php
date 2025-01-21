<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingStatusUpdate extends Mailable
{
    use SerializesModels;

    public $booking;
    public $statusMessages = [
        'confirmed' => 'Your booking has been confirmed. Our team will arrive at the scheduled time.',
        'completed' => 'Your service has been completed. Thank you for choosing Brightbell!',
        'cancelled' => 'Your booking has been cancelled. Please contact us if you have any questions.',
        'pending' => 'Your booking is currently under review.'
    ];

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->markdown('emails.booking-status-update')
                    ->subject('Booking Status Update - ' . $this->booking->booking_number);
    }
}

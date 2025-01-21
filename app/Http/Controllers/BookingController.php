<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Mail\BookingConfirmation;
use App\Mail\NewBookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
  public function public()
  {
    return view('pages.booking');

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'service_type' => 'required|string',
            'frequency' => 'required|string',
            'property_type' => 'required|string',
            'square_footage' => 'required|numeric',
            'address' => 'required|string',
            'preferred_date' => 'required|date|after:today',
            'preferred_time' => 'required|string'
        ]);
    
        $booking = Booking::create([
            'booking_number' => 'BK-' . strtoupper(uniqid()),
            'status' => 'pending',
            ...$validated
        ]);
    
        // Send confirmation email to customer with explicit To header
        Mail::to($booking->email)
            ->send(new BookingConfirmation($booking));
    
        // Send notification to admin with explicit To header
        Mail::to(config('mail.admin_to'))
            ->cc(config('mail.cc_addresses', []))  // Optional CC addresses from config
            ->bcc(config('mail.bcc_addresses', [])) // Optional BCC addresses from config
            ->send(new NewBookingNotification($booking));
    
            return view('pages.booking-success', compact('booking'));
    }
    

    public function track($bookingNumber)
{
    $booking = Booking::where('booking_number', $bookingNumber)->firstOrFail();
    
    $statusDetails = [
        'pending' => [
            'label' => 'Pending Confirmation',
            'description' => 'Your booking is being reviewed by our team.',
            'color' => 'warning'
        ],
        'confirmed' => [
            'label' => 'Booking Confirmed',
            'description' => 'Your booking has been confirmed. Our team will arrive at the scheduled time.',
            'color' => 'info'
        ],
        'completed' => [
            'label' => 'Service Completed',
            'description' => 'The cleaning service has been completed.',
            'color' => 'success'
        ],
        'cancelled' => [
            'label' => 'Booking Cancelled',
            'description' => 'This booking has been cancelled.',
            'color' => 'danger'
        ],
        'invalid' => [
                    'label' => 'Invalid Tracking ID',
                    'description' => 'The provided booking number does not exist in our system.',
                    'color' => 'danger'
                ]
        
    ];

    return view('pages.booking-track', compact('booking', 'statusDetails'));
}

}

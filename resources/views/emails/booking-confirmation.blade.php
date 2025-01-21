@component('mail::message')
# Booking Confirmation

Dear {{ $booking->first_name }},

Thank you for choosing Brightbell Cleaning Services. Your booking has been received successfully.

**Booking Details:**
- Booking Number: {{ $booking->booking_number }}
- Service: {{ ucfirst($booking->service_type) }}
- Date: {{ $booking->preferred_date->format('M d, Y') }}
- Time: {{ ucfirst($booking->preferred_time) }}

**Property Details:**
- Type: {{ ucfirst($booking->property_type) }}
- Address: {{ $booking->address }}

We will contact you shortly to confirm your appointment.

@component('mail::button', ['url' => route('booking.track', $booking->booking_number)])
Track Your Booking
@endcomponent

Best regards,<br>
{{ config('app.name') }}
@endcomponent

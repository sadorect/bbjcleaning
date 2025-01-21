@component('mail::message')
# Booking Status Update

Dear {{ $booking->first_name }},

{{ $statusMessages[$booking->status] }}

**Booking Details:**
- Booking Number: {{ $booking->booking_number }}
- Service: {{ ucfirst($booking->service_type) }}
- Date: {{ $booking->preferred_date->format('M d, Y') }}
- Time: {{ ucfirst($booking->preferred_time) }}

@component('mail::button', ['url' => route('booking.track', $booking->booking_number)])
Track Your Booking
@endcomponent

If you have any questions, please don't hesitate to contact us.

Best regards,<br>
{{ config('app.name') }}
@endcomponent

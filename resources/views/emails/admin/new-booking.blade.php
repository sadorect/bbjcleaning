@component('mail::message')
# New Booking Request

A new booking request has been received.

**Customer Details:**
- Name: {{ $booking->first_name }} {{ $booking->last_name }}
- Email: {{ $booking->email }}
- Phone: {{ $booking->phone }}

**Service Details:**
- Service Type: {{ ucfirst($booking->service_type) }}
- Frequency: {{ ucfirst($booking->frequency) }}
- Preferred Date: {{ $booking->preferred_date->format('M d, Y') }}
- Preferred Time: {{ $booking->preferred_time }}

**Property Details:**
- Type: {{ ucfirst($booking->property_type) }}
- Size: {{ $booking->square_footage }} sq ft
- Address: {{ $booking->address }}

@component('mail::button', ['url' => route('admin.bookings.show', $booking->id)])
View Booking Details
@endcomponent

Best regards,<br>
{{ config('app.name') }}
@endcomponent

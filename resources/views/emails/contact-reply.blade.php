@component('mail::message')
# Hello {{ $contact->name }},

{!! nl2br(e($replyMessage)) !!}

Thank you for contacting Brightbell Cleaning Services.

Best regards,<br>
{{ config('app.name') }}
@endcomponent

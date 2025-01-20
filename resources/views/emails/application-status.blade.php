@component('mail::message')
# Application Status Update

Dear {{ $application->first_name }},

{!! $message !!}

Current Status: {{ ucfirst($application->status) }}

@component('mail::button', ['url' => route('careers.track')])
Track Your Application
@endcomponent

Thank you,<br>
{{ config('app.name') }}
@endcomponent

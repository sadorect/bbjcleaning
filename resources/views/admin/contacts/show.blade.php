@extends('layouts.admin')

@section('title', 'Contact Details')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <p class="text-gray-900">{{ $contact->name }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <p class="text-gray-900">{{ $contact->email }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Service</label>
            <p class="text-gray-900">{{ $contact->service }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Message</label>
            <p class="text-gray-900">{{ $contact->message }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Submitted On</label>
            <p class="text-gray-900">{{ $contact->created_at->format('M d, Y h:i A') }}</p>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('admin.contacts.index') }}" class="text-blue-500 hover:text-blue-800">
                Back to List
            </a>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Contact Details')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <!-- Contact Information -->
        <div class="mb-6">
            <h2 class="text-xl font-bold mb-4">Contact Information</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <p class="text-gray-900">{{ $contact->name }}</p>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <p class="text-gray-900">{{ $contact->email }}</p>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Service</label>
                    <p class="text-gray-900">{{ $contact->service }}</p>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                    <p class="text-gray-900">{{ $contact->phone ?? 'Not provided' }}</p>
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Message</label>
                <p class="text-gray-900">{{ $contact->message }}</p>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Submitted On</label>
                <p class="text-gray-900">{{ $contact->created_at->format('M d, Y h:i A') }}</p>
            </div>
        </div>

        <!-- Reply Form -->
        <div class="mb-6">
            <h2 class="text-xl font-bold mb-4">Send Reply</h2>
            <form action="{{ route('admin.contacts.reply', $contact) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
                        Subject
                    </label>
                    <input type="text" 
                           name="subject" 
                           id="subject" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           value="Re: Contact Form Submission"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="reply_message">
                        Reply Message
                    </label>
                    <textarea name="reply_message" 
                              id="reply_message" 
                              rows="6" 
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              required></textarea>
                </div>

                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Send Reply
                </button>
            </form>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-between items-center">
            <a href="{{ route('admin.contacts.index') }}" 
               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to List
            </a>

            <form action="{{ route('admin.contacts.destroy', $contact) }}" 
                  method="POST" 
                  onsubmit="return confirm('Are you sure you want to delete this contact?');"
                  class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete Contact
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

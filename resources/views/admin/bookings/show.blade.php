@extends('layouts.admin')

@section('title', 'Booking Details')

@section('content')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Booking #{{ $booking->booking_number }}</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Customer Information</h5>
                            <p><strong>Name:</strong> {{ $booking->first_name }} {{ $booking->last_name }}</p>
                            <p><strong>Email:</strong> {{ $booking->email }}</p>
                            <p><strong>Phone:</strong> {{ $booking->phone }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Service Details</h5>
                            <p><strong>Type:</strong> {{ ucfirst($booking->service_type) }}</p>
                            <p><strong>Frequency:</strong> {{ ucfirst($booking->frequency) }}</p>
                            <p><strong>Schedule:</strong> {{ $booking->preferred_date->format('M d, Y') }} 
                                ({{ ucfirst($booking->preferred_time) }})</p>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5>Property Details</h5>
                            <p><strong>Type:</strong> {{ ucfirst($booking->property_type) }}</p>
                            <p><strong>Size:</strong> {{ $booking->square_footage }} sq ft</p>
                            <p><strong>Address:</strong> {{ $booking->address }}</p>
                        </div>
                    </div>

                    @if($booking->notes)
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5>Notes</h5>
                            <p>{{ $booking->notes }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Update Status</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>
                                <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>
                                    Confirmed
                                </option>
                                <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>
                                    Completed
                                </option>
                                <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>
                                    Cancelled
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea name="notes" class="form-control" rows="3">{{ $booking->notes }}</textarea>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="notify_customer" id="notify_customer" value="1">
                                <label class="form-check-label" for="notify_customer">
                                    Notify customer via email
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

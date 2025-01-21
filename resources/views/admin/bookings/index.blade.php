@extends('layouts.admin')

@section('title', 'Manage Bookings')

@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">All Bookings</h4>
                <div class="d-flex gap-3">
                    <select id="status-filter" class="form-select">
                        <option value="">All Statuses</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Booking #</th>
                            <th>Customer</th>
                            <th>Service</th>
                            <th>Date & Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->booking_number }}</td>
                            <td>
                                {{ $booking->first_name }} {{ $booking->last_name }}<br>
                                <small class="text-muted">{{ $booking->email }}</small>
                            </td>
                            <td>{{ ucfirst($booking->service_type) }}</td>
                            <td>
                                {{ $booking->preferred_date->format('M d, Y') }}<br>
                                <small class="text-muted">{{ ucfirst($booking->preferred_time) }}</small>
                            </td>
                            <td>
                                <span class="badge bg-{{ $booking->status === 'pending' ? 'warning' : 
                                    ($booking->status === 'confirmed' ? 'info' : 
                                    ($booking->status === 'completed' ? 'success' : 'danger')) }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.bookings.show', $booking) }}" 
                                   class="btn btn-sm btn-primary">
                                    View Details
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $bookings->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('status-filter').addEventListener('change', function() {
        window.location.href = '{{ route("admin.bookings.index") }}?status=' + this.value;
    });
</script>
@endpush
@endsection

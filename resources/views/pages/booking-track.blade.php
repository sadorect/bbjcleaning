<x-frontend>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Booking Status Tracker</h3>
                    </div>
                    <div class="card-body">
                        <!-- Status Display -->
                        <div class="status-section mb-4">
                            <div class="alert alert-{{ $statusDetails[$booking->status]['color'] }}">
                                <h4 class="alert-heading">{{ $statusDetails[$booking->status]['label'] }}</h4>
                                <p>{{ $statusDetails[$booking->status]['description'] }}</p>
                            </div>
                        </div>

                        <!-- Progress Timeline -->
                        <div class="timeline mb-4">
                            @foreach(['pending', 'confirmed', 'completed'] as $status)
                                <div class="timeline-item {{ $booking->status === $status ? 'active' : '' }}">
                                    <div class="timeline-marker {{ $booking->status === $status ? 'bg-primary' : 'bg-secondary' }}"></div>
                                    <div class="timeline-content">
                                        <h5>{{ $statusDetails[$status]['label'] }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Booking Details -->
                        <div class="booking-details">
                            <h4>Booking Information</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li><strong>Booking Number:</strong> {{ $booking->booking_number }}</li>
                                        <li><strong>Service:</strong> {{ ucfirst($booking->service_type) }}</li>
                                        <li><strong>Frequency:</strong> {{ ucfirst($booking->frequency) }}</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li><strong>Date:</strong> {{ $booking->preferred_date->format('M d, Y') }}</li>
                                        <li><strong>Time:</strong> {{ ucfirst($booking->preferred_time) }}</li>
                                        <li><strong>Status:</strong> {{ ucfirst($booking->status) }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .timeline {
            position: relative;
            padding: 20px 0;
        }
        .timeline:before {
            content: '';
            position: absolute;
            top: 0;
            left: 15px;
            height: 100%;
            width: 2px;
            background: #dee2e6;
        }
        .timeline-item {
            position: relative;
            padding-left: 40px;
            margin-bottom: 20px;
        }
        .timeline-marker {
            position: absolute;
            left: 0;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 0 0 2px #dee2e6;
        }
        .timeline-item.active .timeline-marker {
            box-shadow: 0 0 0 2px #007bff;
        }
    </style>
</x-frontend>

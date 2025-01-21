<x-frontend>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-success">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0">Booking Submitted!</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 48px;"></i>
                        </div>
                        
                        <h4>Thank you for choosing Brightbell Cleaning Services!</h4>
                        <p>Your booking has been received successfully.</p>
                        
                        <div class="booking-details mt-4">
                            <h5>Booking Details:</h5>
                            <ul class="list-unstyled">
                                <li><strong>Booking Number:</strong> {{ $booking->booking_number }}</li>
                                <li><strong>Service:</strong> {{ ucfirst($booking->service_type) }}</li>
                                <li><strong>Date:</strong> {{ $booking->preferred_date->format('M d, Y') }}</li>
                                <li><strong>Time:</strong> {{ ucfirst($booking->preferred_time) }}</li>
                            </ul>
                        </div>

                        <div class="next-steps mt-4">
                            <h5>Next Steps:</h5>
                            <ol>
                                <li>Check your email for booking confirmation</li>
                                <li>Save your booking number for reference</li>
                                <li>We'll contact you to confirm the details</li>
                            </ol>
                        </div>

                        <div class="mt-4 text-center">
                            <a href="{{ route('booking.track', $booking->booking_number) }}" 
                               class="btn btn-primary">
                                Track Your Booking
                            </a>
                            <a href="{{ route('home') }}" 
                               class="btn btn-outline-secondary">
                                Return to Homepage
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend>

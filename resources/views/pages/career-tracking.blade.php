<x-frontend>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h2 class="text-white mb-0">Track Your Application</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('careers.track.status') }}" method="POST" class="mb-4">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" 
                                    placeholder="Enter your email address" 
                                    value="{{ old('email', $email ?? '') }}" required>
                                <button class="btn btn-primary" type="submit">Track Application</button>
                            </div>
                        </form>

                        @if(isset($applications) && $applications->count() > 0)
                            <div class="applications-list">
                                @foreach($applications as $application)
                                    <div class="application-card mb-4 p-4 border rounded">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="mb-2">Application #{{ $application['id'] }}</h4>
                                                <p class="mb-1"><strong>Position:</strong> {{ ucfirst(str_replace('_', ' ', $application['position'])) }}</p>
                                                <p class="mb-1"><strong>Submitted:</strong> {{ $application['submitted_date'] }}</p>
                                                <p class="mb-1"><strong>Last Updated:</strong> {{ $application['last_updated'] }}</p>
                                            </div>
                                            <div class="status-badge">
                                                <span class="badge bg-{{ $application['status']['label'] === 'Under Review' ? 'warning' : 
                                                    ($application['status']['label'] === 'Interview Stage' ? 'success' : 
                                                    ($application['status']['label'] === 'Not Selected' ? 'danger' : 'info')) }} 
                                                    p-2">
                                                    {{ $application['status']['label'] }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="status-description mt-3">
                                            <p class="mb-0 text-muted">{{ $application['status']['description'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @elseif(isset($applications))
                            <div class="alert alert-info">
                                No applications found for this email address.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .application-card {
            transition: all 0.3s ease;
            background-color: #fff;
        }
        .application-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .status-badge {
            min-width: 120px;
            text-align: center;
        }
        .status-description {
            border-top: 1px solid #eee;
            padding-top: 1rem;
        }
    </style>
</x-frontend>

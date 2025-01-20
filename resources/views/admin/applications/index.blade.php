@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Job Applications</h1>
    
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>All Applications</div>
                <div>
                    <select id="status-filter" class="form-select">
                        <option value="">All Statuses</option>
                        <option value="pending">Pending</option>
                        <option value="reviewed">Reviewed</option>
                        <option value="contacted">Contacted</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->first_name }} {{ $application->last_name }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $application->employment_type)) }}</td>
                        <td>
                            <span class="badge bg-{{ $application->status === 'pending' ? 'warning' : 
                                ($application->status === 'contacted' ? 'success' : 
                                ($application->status === 'rejected' ? 'danger' : 'info')) }}">
                                {{ ucfirst($application->status) }}
                            </span>
                        </td>
                        <td>{{ $application->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.applications.show', $application) }}" 
                               class="btn btn-sm btn-primary">View Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $applications->links() }}
        </div>
    </div>
</div>
@endsection

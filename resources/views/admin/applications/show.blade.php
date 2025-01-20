@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Application Details</h1>
        <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Applicant Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Name:</strong> 
                            {{ $application->first_name }} {{ $application->last_name }}
                        </div>
                        <div class="col-md-6">
                            <strong>Email:</strong> 
                            {{ $application->email }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Position Type:</strong> 
                            {{ ucfirst($application->employment_type) }}
                        </div>
                        <div class="col-md-6">
                            <strong>Experience:</strong> 
                            {{ $application->years_experience }} years
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Available Days:</strong><br>
                            {{ implode(', ', $application->available_days) }}
                        </div>
                    </div>

                    <!-- In the documents section -->
<div class="row mb-3">
  <div class="col-12">
      <strong>Documents:</strong><br>
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#resumeModal">
          <i class="fas fa-eye"></i> View Resume
      </button>
      <a href="{{ Storage::url($application->resume_path) }}" class="btn btn-info btn-sm" download>
          <i class="fas fa-download"></i> Download Resume
      </a>
      @if($application->cover_letter_path)
          <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#coverLetterModal">
              <i class="fas fa-eye"></i> View Cover Letter
          </button>
          <a href="{{ Storage::url($application->cover_letter_path) }}" class="btn btn-info btn-sm" download>
              <i class="fas fa-download"></i> Download Cover Letter
          </a>
      @endif
  </div>
</div>

<!-- Add Modals at the bottom of the page -->
<div class="modal fade" id="resumeModal" tabindex="-1">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Resume Preview</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <x-document-viewer :path="$application->resume_path" type="resume" />
          </div>
      </div>
  </div>
</div>


@if($application->cover_letter_path)
<div class="modal fade" id="coverLetterModal" tabindex="-1">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Cover Letter Preview</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <iframe src="{{ Storage::url($application->cover_letter_path) }}" 
                      style="width: 100%; height: 80vh;" frameborder="0"></iframe>
          </div>
      </div>
  </div>
</div>
@endif


                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Update Status</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.applications.update-status', $application) }}" 
                          method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="pending" 
                                    {{ $application->status === 'pending' ? 'selected' : '' }}>
                                    Pending Review
                                </option>
                                <option value="reviewed" 
                                    {{ $application->status === 'reviewed' ? 'selected' : '' }}>
                                    Reviewed
                                </option>
                                <option value="contacted" 
                                    {{ $application->status === 'contacted' ? 'selected' : '' }}>
                                    Contacted
                                </option>
                                <option value="rejected" 
                                    {{ $application->status === 'rejected' ? 'selected' : '' }}>
                                    Rejected
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" 
                                       name="send_email" id="send_email" value="1">
                                <label class="form-check-label" for="send_email">
                                    Send email notification
                                </label>
                            </div>
                        </div>

                        <div class="mb-3" id="email-message-container" style="display: none;">
                            <label class="form-label">Email Message</label>
                            <textarea name="email_message" class="form-control" rows="4"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('send_email').addEventListener('change', function() {
        document.getElementById('email-message-container').style.display = 
            this.checked ? 'block' : 'none';
    });
</script>
@endpush
@endsection

<x-frontend>
    <div class="container py-5">
      <!-- Add this near the top of the page -->
          <div class="text-center mb-4">
            <a href="{{ route('careers.track') }}" class="btn btn-info">
                Track Your Application Status
            </a>
          </div>
      <div class="row justify-content-center">
        <h1 class="text-center mb-5">Join Our Team</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('careers.store') }}" method="POST" enctype="multipart/form-data" class="custom-form-style-1">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>First Name *</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Last Name *</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Gender *</label>
                    <select name="gender" class="form-control" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        
                    </select>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Email *</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Do you have a vehicle? *</label>
                    <select name="has_vehicle" class="form-control" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Employment Type *</label>
                    <select name="employment_type" class="form-control" required>
                        <option value="full_time">Full Time</option>
                        <option value="part_time">Part Time</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Are you permitted to work in Canada? *</label>
                    <select name="can_work_in_canada" class="form-control" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label>Available Days *</label>
                <div class="form-check">
                    <input type="checkbox" name="available_days[]" value="monday" class="form-check-input">
                    <label class="form-check-label">Monday</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="available_days[]" value="tuesday" class="form-check-input">
                    <label class="form-check-label">Tuesday</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="available_days[]" value="wednesday" class="form-check-input">
                    <label class="form-check-label">Wednesday</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="available_days[]" value="thursday" class="form-check-input">
                    <label class="form-check-label">Thursday</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="available_days[]" value="friday" class="form-check-input">
                    <label class="form-check-label">Friday</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="available_days[]" value="saturday" class="form-check-input">
                    <label class="form-check-label">Saturday</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="available_days[]" value="sunday" class="form-check-input">
                    <label class="form-check-label">Sunday</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Preferred Hours *</label>
                    <input type="text" name="preferred_hours" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Can you work weekends? *</label>
                    <select name="weekend_availability" class="form-control" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Do you have cleaning/housekeeping experience? *</label>
                    <select name="has_cleaning_experience" class="form-control" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Years of Experience *</label>
                    <input type="number" name="years_experience" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label>Resume *</label>
                <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
            </div>

            <div class="mb-3">
                <label>Cover Letter (Optional)</label>
                <input type="file" name="cover_letter" class="form-control" accept=".pdf,.doc,.docx">
            </div>

            <div class="mb-3">
                <label>Additional Notes</label>
                <textarea name="additional_notes" class="form-control" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
      </div>
    </div>
</x-frontend>

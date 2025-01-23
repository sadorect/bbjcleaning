<x-frontend>
  @vite(['resources/js/booking-wizard.js'])
  @vite(['resources/css/booking-wizard.css'])
  <section class="page-header page-header-modern bg-tertiary border-0 my-0">
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-12 font-weight-bold">Booking</h1>
                <span class="sub-title font-weight-bold">Professional cleaning services tailored to your needs</span>
            </div>
        </div>
    </div>
</section>
  <div class="container py-5">
      <h1 class="text-center mb-4">Book Your Cleaning Service</h1>
      <div class="booking-wizard">
          <!-- Progress Bar -->
          <div class="progress-wrapper mb-5">
              <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 0%"></div>
              </div>
              <div class="progress-labels d-flex justify-content-between">
                  <span class="step active">Contact Info</span>
                  <span class="step">Service Details</span>
                  <span class="step">Property Info</span>
                  <span class="step">Schedule</span>
                  <span class="step">Review</span>
              </div>
          </div>

          <form id="bookingForm" action="" method="POST">
              @csrf
              <!-- Step 1: Contact Information -->
              <div class="step-content active" id="step1">
                  <h3>Contact Information</h3>
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
                          <label>Email *</label>
                          <input type="email" name="email" class="form-control" required>
                      </div>
                      <div class="col-md-6 mb-3">
                          <label>Phone *</label>
                          <input type="tel" name="phone" class="form-control" required>
                      </div>
                  </div>
                  <button type="button" class="btn btn-primary next-step">Continue</button>
              </div>

              <!-- Step 2: Service Details -->
              <div class="step-content" id="step2">
                  <h3>Service Details</h3>
                  <div class="mb-3">
                      <label>Service Type *</label>
                      <select name="service_type" class="form-control" required>
                          <option value="">Select Service</option>
                          <option value="residential">Residential Cleaning</option>
                          <option value="commercial">Commercial Cleaning</option>
                          <option value="deep">Deep Cleaning</option>
                          <option value="move">Move In/Out Cleaning</option>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label>Service Frequency</label>
                      <select name="frequency" class="form-control">
                          <option value="one-time">One Time</option>
                          <option value="weekly">Weekly</option>
                          <option value="bi-weekly">Bi-Weekly</option>
                          <option value="monthly">Monthly</option>
                      </select>
                  </div>
                  <button type="button" class="btn btn-secondary prev-step">Back</button>
                  <button type="button" class="btn btn-primary next-step">Continue</button>
              </div>

              <!-- Step 3: Property Information -->
              <div class="step-content" id="step3">
                  <h3>Property Information</h3>
                  <div class="row">
                      <div class="col-md-6 mb-3">
                          <label>Property Type *</label>
                          <select name="property_type" class="form-control" required>
                              <option value="house">House</option>
                              <option value="apartment">Apartment</option>
                              <option value="office">Office</option>
                              <option value="retail">Retail Space</option>
                          </select>
                      </div>
                      <div class="col-md-6 mb-3">
                          <label>Square Footage *</label>
                          <input type="number" name="square_footage" class="form-control" required>
                      </div>
                  </div>
                  <div class="mb-3">
                      <label>Address *</label>
                      <input type="text" name="address" class="form-control" required>
                  </div>
                  <button type="button" class="btn btn-secondary prev-step">Back</button>
                  <button type="button" class="btn btn-primary next-step">Continue</button>
              </div>

              <!-- Step 4: Schedule -->
              <div class="step-content" id="step4">
                  <h3>Schedule Your Service</h3>
                  <div class="row">
                      <div class="col-md-6 mb-3">
                          <label>Preferred Date *</label>
                          <input type="date" name="preferred_date" class="form-control" required>
                      </div>
                      <div class="col-md-6 mb-3">
                          <label>Preferred Time *</label>
                          <select name="preferred_time" class="form-control" required>
                              <option value="morning">Morning (8AM - 12PM)</option>
                              <option value="afternoon">Afternoon (12PM - 4PM)</option>
                              <option value="evening">Evening (4PM - 8PM)</option>
                          </select>
                      </div>
                  </div>
                  <button type="button" class="btn btn-secondary prev-step">Back</button>
                  <button type="button" class="btn btn-primary next-step">Review</button>
              </div>

              <!-- Step 5: Review -->
              <div class="step-content" id="step5">
                  <h3>Review Your Booking</h3>
                  <div id="bookingSummary" class="mb-4">
                      <!-- Dynamically populated via JavaScript -->
                  </div>
                  <button type="button" class="btn btn-secondary prev-step">Back</button>
                  <button type="submit" class="btn btn-success">Confirm Booking</button>
              </div>
          </form>
      </div>
  </div>



</x-frontend>

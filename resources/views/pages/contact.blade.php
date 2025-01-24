<x-frontend>
  <section class="page-header page-header-modern bg-tertiary border-0 my-0">
      <div class="container my-3">
          <div class="row">
              <div class="col-md-12 text-center">
                  <h1 class="text-10 font-weight-bold text-white">Contact Us</h1>
                  <span class="sub-title text-white">We're here to help with your cleaning needs</span>
              </div>
          </div>
      </div>
  </section>
  <div class="container py-5">
      <div class="row">
          <!-- Contact Information -->
          <div class="col-lg-4">
              <div class="contact-info mb-5">
                  <h3 class="mb-4">Get In Touch</h3>
                    
                  <div class="info-item mb-4">
                      <i class="fas fa-phone fa-lg text-primary"></i>
                      <div class="info-content">
                          <h5>Call Us</h5>
                          <p><a href="tel:+12046887777">+1 204 688 7777</a></p>
                      </div>
                  </div>

                  <div class="info-item mb-4">
                      <i class="fas fa-envelope fa-lg text-primary"></i>
                      <div class="info-content">
                          <h5>Email Us</h5>
                          <p><a href="mailto:info@brightbell.com">info@brightbell.com</a></p>
                      </div>
                  </div>

                  <div class="info-item mb-4">
                      <i class="fas fa-map-marker-alt fa-lg text-primary"></i>
                      <div class="info-content">
                          <h5>Visit Us</h5>
                          <p>511-44 The Promenade street<br>Winnipeg, MB R3B 3H9 Canada</p>
                      </div>
                  </div>
                  
                  <div class="info-item">
                      <i class="fas fa-clock fa-lg text-primary"></i>
                      <div class="info-content">
                          <h5>Business Hours</h5>
                          <p>Monday - Sunday: 8:00 AM - 8:00 PM</p>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Contact Form -->
          <div class="col-lg-8">
              <div class="contact-form">
                  <h3 class="mb-4">Send Us a Message</h3>
                    
                  @if(session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif

                  <form id="contactForm" action="{{ route('contact.store') }}" method="POST" class="direct-submit">
                      @csrf
                      <div class="row">
                          <div class="col-md-6 mb-3">
                              <label class="form-label">Name *</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                     name="name" value="{{ old('name') }}" required>
                              @error('name')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                              <label class="form-label">Phone</label>
                              <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                     name="phone" value="{{ old('phone') }}">
                              @error('phone')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      <div class="mb-3">
                          <label class="form-label">Email *</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                 name="email" value="{{ old('email') }}" required>
                          @error('email')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
@php
    $services = App\Models\Service::all();
@endphp
                      <div class="mb-3">
                          <label class="form-label">Service Interest *</label>
                          <select class="form-select @error('service') is-invalid @enderror" 
                                  name="service" required>
                              <option value="">Select a Service</option>
                              @foreach($services as $service)
                                  <option value="{{ $service->name }}" 
                                          {{ old('service') == $service->name ? 'selected' : '' }}>
                                      {{ $service->name }}
                                  </option>
                              @endforeach
                          </select>
                          @error('service')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label class="form-label">Message *</label>
                          <textarea class="form-control @error('message') is-invalid @enderror" 
                                    name="message" rows="5" required>{{ old('message') }}</textarea>
                          @error('message')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <button type="submit" class="btn btn-primary">Send Message</button>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <!-- Google Map -->
<div class="map-section mt-5">
    <div id="map" style="height: 400px;"></div>
</div>
@php
    $latitude = 49.89295639999999;
    $longitude = -97.1478479;
@endphp

<script>
    function initMap() {
        const location = { 
            lat: {{ config('services.google.map_lat', '49.89295639999999') }}, 
            lng: {{ config('services.google.map_lng', '-97.1478479') }}
        };
        
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: location,
            styles: [
                {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [{ "visibility": "off" }]
                }
            ]
        });
        
        const marker = new google.maps.Marker({
            position: location,
            map: map,
            title: 'Brightbell Cleaning Services'
        });
    }
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&callback=initMap">
</script>
  
  
  @include('partials.contact-footer')

</x-frontend>
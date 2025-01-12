<x-frontend>
  <!-- Keep your existing tooltip styles -->
  <style>
    .tooltipz {
      position: relative;
      display:block;
    }
    .tooltipz .tooltipztext {
      visibility: hidden;
      width: auto;
      background-color: black;
      color: #fff;
      text-align: center;
      padding: 5px 10px;
      border-radius: 6px;
      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      transform: translateX(-50%);
      opacity: 0;
      transition: opacity 0.3s;
    }
    .tooltipz:hover .tooltipztext {
      visibility: visible;
      opacity: 1;
    }
  </style>

  <div role="main" class="main">
    <!-- Enhanced Hero Section -->
    <section class="page-header page-header-modern page-header-lg overlay overlay-show overlay-op-9 bg-primary border-0 m-0" style="background-image: url({{ basset('frontend/img/demos/cleaning-services/services/services-header.jpg') }});">
      <div class="container my-3">
        <div class="row">
          <div class="col-md-12 align-self-center p-static order-2 text-center">
            <h1 class="font-weight-bold text-light text-10">Professional Cleaning Services</h1>
            <p class="text-light opacity-7 text-4">Tailored solutions for homes and businesses</p>
          </div>
        </div>
      </div>
    </section>
@php
$services = App\Models\Service::all();
@endphp

    <!-- Service Categories Grid -->
    <section class="section border-0 m-0 bg-light">
      <div class="container">
        <div class="row gy-5">
          @foreach($services as $service)
          <div class="col-lg-4 col-md-6">
            <div class="card border-0 bg-white h-100 box-shadow-1 hover-box-shadow-3 transition-all">
              <div class="card-body p-5">
                <div class="service-icon mb-4">
                  <img src="{{ basset('frontend/img/demos/cleaning-services/icons/' . $service->icon) }}" alt="{{ $service->name }}" class="img-fluid" width="60">
                </div>
                <h4 class="font-weight-bold text-5 mb-3">{{ $service->name }}</h4>
                <p class="mb-4">{{ $service->description }}</p>
                <ul class="list list-icons list-icons-style-2 list-primary mb-4">
                  @if($service->features)
                    @foreach(json_decode($service->features, true) ?? [] as $feature)
                    <li><i class="fas fa-check"></i> {{ $feature }}</li>
                    @endforeach
                  @endif
                </ul>
                <a href="{{ route('contact') }}?service={{ $service->id }}" class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3">
                  BOOK NOW
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="section section-height-3 bg-primary border-0 m-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h2 class="text-light font-weight-bold mb-4">Why Choose Brightbell?</h2>
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="feature-box feature-box-style-2">
                  <div class="feature-box-icon">
                    <i class="fas fa-star text-light"></i>
                  </div>
                  <div class="feature-box-info">
                    <h4 class="text-light font-weight-bold mb-2">Expert Staff</h4>
                    <p class="text-light opacity-7">Professionally trained and vetted cleaners</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="feature-box feature-box-style-2">
                  <div class="feature-box-icon">
                    <i class="fas fa-clock text-light"></i>
                  </div>
                  <div class="feature-box-info">
                    <h4 class="text-light font-weight-bold mb-2">Flexible Scheduling</h4>
                    <p class="text-light opacity-7">Services that fit your timeline</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card border-0">
              <div class="card-body p-5">
                <h3 class="font-weight-bold text-4 mb-3">Request a Quote</h3>
                <form id="quoteForm" class="contact-form" action="php/contact-form.php" method="POST">
                  @csrf
                  <div class="row">
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col">
                      <select class="form-control" name="service" required>
                        <option value="">Select Service</option>
                        @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col">
                      <textarea class="form-control" name="message" rows="4" placeholder="Tell us about your needs" required></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3 w-100">GET QUOTE</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section bg-light border-0 m-0">
      <div class="container">
        <div class="row text-center mb-4">
          <div class="col">
            <h2 class="font-weight-bold text-8">What Our Clients Say</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="owl-carousel owl-theme nav-outside nav-arrows-1" data-plugin-options="{'items': 2, 'loop': true, 'nav': true, 'dots': false}">
              <!-- Add dynamic testimonials here -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</x-frontend>

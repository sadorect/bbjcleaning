<x-frontend>
  <div role="main" class="main">
    <!-- Hero Section with Video Background -->
    
    <video class="hero-background-video" autoplay muted loop>
      <source src="{{ asset('frontend/videos/cleaning-hero.mp4') }}" type="video/mp4">
    </video>
  
    <section class="section section-with-shape-divider section-parallax bg-tertiary border-0 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '110%', 'fadeIn': true}" data-image-src="img/demos/cleaning-services/backgrounds/background-1.jpg">
      <div class="container position-relative z-index-1 pb-5 my-5">
        <div class="row justify-content-center pb-5 mb-5">
          <div class="col-md-10 col-lg-8 text-center">
            <h1 class="text-color-light font-weight-bold text-10">Professional Cleaning Excellence in Ottawa</h1>
            <h2 class="text-color-light font-weight-medium line-height-4 text-4 mb-3">Where Cleanliness Meets Perfection</h2>
            <p class="custom-font-secondary text-4 mb-4 text-color-light opacity-7">Transform your space with our premium cleaning services. Trusted by 1000+ clients.</p>
            <a href="#get-quote" class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">GET FREE QUOTE</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Highlight Section -->
<section class="section bg-primary border-0 m-0">
  <div class="container">
      <div class="row align-items-end pb-3 mb-5">
          <div class="col-lg-7 col-xl-8 mb-4 mb-lg-0">
              <div class="d-flex align-items-center mb-2">
                  <span class="custom-line appear-animation" data-appear-animation="customLineAnimation"></span>
                  <h2 class="text-color-light font-weight-bold text-6 mb-0 appear-animation" data-appear-animation="fadeInUpShorter">Our Guaranty</h2>
              </div>
          </div>
      </div>
      <div class="row align-items-center">
          <!-- Professional Cleaners -->
          <div class="col-lg-4 text-center mb-5 mb-lg-0">
              <div class="appear-animation" data-appear-animation="fadeInLeftShorter">
                  <div class="feature-box">
                      <i class="fas fa-user-tie text-color-light fa-3x mb-4"></i>
                      <h3 class="text-color-light font-weight-bold text-4 mb-2">Professional Cleaners</h3>
                      <p class="text-color-light opacity-7">Our team of experienced, professional cleaners ensures exceptional service and spotless results every time. Trust us to handle all your cleaning needs with precision and care.</p>
                  </div>
              </div>
          </div>

          <!-- Same Day Availability -->
          <div class="col-lg-4 text-center mb-5 mb-lg-0">
              <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                  <div class="feature-box">
                      <i class="fas fa-clock text-color-light fa-3x mb-4"></i>
                      <h3 class="text-color-light font-weight-bold text-4 mb-2">Same Day Availability</h3>
                      <p class="text-color-light opacity-7">In need of urgent cleaning? We've got you covered with our same-day availability. Schedule a cleaning today and enjoy a pristine space by the end of the day.</p>
                  </div>
              </div>
          </div>

          <!-- Affordable Price -->
          <div class="col-lg-4 text-center">
              <div class="appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                  <div class="feature-box">
                      <i class="fas fa-tags text-color-light fa-3x mb-4"></i>
                      <h3 class="text-color-light font-weight-bold text-4 mb-2">Affordable Price</h3>
                      <p class="text-color-light opacity-7">Quality cleaning services don't have to break the bank. We offer competitive, affordable pricing to fit any budget, ensuring everyone can enjoy a clean and healthy environment.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

    <!-- Services Section -->
    <section class="section border-0 py-4 m-0">
      <div class="container">
        <div class="row align-items-end pb-3 mb-5">
          <div class="col-lg-7 col-xl-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center mb-2">
              <span class="custom-line appear-animation" data-appear-animation="customLineAnimation"></span>
              <h2 class="text-color-primary font-weight-bold text-6 mb-0 appear-animation" data-appear-animation="fadeInUpShorter">Our Services</h2>
            </div>
            <h3 class="text-color-secondary font-weight-bold text-transform-none text-8 mb-3 pb-1 appear-animation" data-appear-animation="fadeInUpShorter">Premium Cleaning Solutions</h3>
          </div>
        </div>
        @php
        // Fetch services from the database
        $services = App\Models\Service::all();
        @endphp
        
        <div class="row appear-animation" data-appear-animation="fadeInUpShorter">
          <!-- Service Cards Here - Using Your Existing Service Cards Structure -->
          @foreach ($services as $service)
            <div class="col-lg-4 mb-4">
              <div class="card custom-card-style-1">
                <div class="card-body text-center py-5">
                  <div class="custom-card-style-1-image-wrapper bg-primary rounded-circle d-inline-block mb-3">
                    <img src="{{ asset('frontend/img/demos/cleaning-services/services/' . $service->image) }}" class="img-fluid rounded-circle" alt="" />
                  </div>
                  <h4 class="custom-card-style-1-title text-color-secondary font-weight-bold mb-2">{{ $service->name }}</h4>
                  <p class="custom-card-style-1-description">{{ $service->shortDescr }}</p>
                  <a href="{{ route('services') }}" class="custom-card-style-1-link font-weight-bold">VIEW MORE</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    @include('partials.why-choose-us')

    <!-- Process Section -->
    <section class="section section-with-shape-divider bg-tertiary border-0 m-0">
      <div class="container py-5">
        <div class="row align-items-center justify-content-center py-5">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h3 class="text-color-light font-weight-bold text-8 mb-4">Simple 3-Step Process</h3>
            <div class="process-steps">
              <div class="process-step mb-5">
                <div class="step-number">1</div>
                <h4 class="text-color-light">Book Online</h4>
                <p class="text-color-light opacity-7">Schedule your service in 60 seconds</p>
              </div>
              <div class="process-step mb-5">
                <div class="step-number">2</div>
                <h4 class="text-color-light">We Clean</h4>
                <p class="text-color-light opacity-7">Expert team arrives with professional equipment</p>
              </div>
              <div class="process-step">
                <div class="step-number">3</div>
                <h4 class="text-color-light">You Relax</h4>
                <p class="text-color-light opacity-7">Enjoy your spotless space</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section border-0 m-0">
      <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-lg-9 col-xl-8 text-center">
            <h3 class="text-color-secondary font-weight-bold text-8 mb-3">What Our Clients Say</h3>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="owl-carousel owl-theme nav-outside nav-arrows-1" data-plugin-options="{'items': 2, 'loop': true, 'nav': true, 'dots': false}">
              <!-- Testimonial Items -->
              <div class="testimonial testimonial-style-3">
                <blockquote class="card custom-card-style-1">
                  <p class="mb-0">Exceptional service! The attention to detail is remarkable.</p>
                </blockquote>
                <div class="testimonial-author">
                  <p><strong>Sarah Johnson</strong><span>Homeowner</span></p>
                </div>
              </div>
              <div class="testimonial testimonial-style-3">
                <blockquote class="card custom-card-style-1">
                  <p class="mb-0">Best commercial cleaning service we've ever used.</p>
                </blockquote>
                <div class="testimonial-author">
                  <p><strong>Michael Chen</strong><span>Office Manager</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Call to Action Section -->
    <section class="section section-with-shape-divider section-height-3 bg-tertiary border-0 m-0">
      <div class="container py-3">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-9 col-lg-7 col-xl-9">
            <h2 class="text-color-light font-weight-bold text-9 mb-3">Ready for a Cleaner Space?</h2>
            <p class="custom-font-secondary text-4 text-color-light opacity-7">Get your free quote today and experience the Brightbell difference</p>
            <a href="{{ route('contact') }}" class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3 appear-animation" data-appear-animation="fadeInUpShorter">SCHEDULE NOW</a>
            <a href="tel:+12046887777" class="btn btn-secondary btn-modern font-weight-bold text-3 px-5 py-3 ms-4 appear-animation" data-appear-animation="fadeInUpShorter">CALL US</a>
          </div>
        </div>
      </div>
    </section>
  </div>
</x-frontend>

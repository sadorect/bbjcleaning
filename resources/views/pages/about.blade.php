<x-frontend>
  <div role="main" class="main">
    <!-- Hero Section -->
    <section class="page-header page-header-modern page-header-lg bg-tertiary border-0 my-0">
      <div class="container my-3">
        <div class="row">
          <div class="col-md-12 align-self-center p-static order-2 text-center">
            <h1 class="font-weight-bold text-10">About Brightbell</h1>
          </div>
          <div class="col-md-12 align-self-center order-1">
            <ul class="breadcrumb breadcrumb-light d-block text-center">
              <li><a href="#">Home</a></li>
              <li class="active">About Us</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Company Story -->
    <section class="section border-0 pb-0 pb-lg-5 m-0">
      <div class="container my-lg-4">
        <div class="row">
          <div class="col-lg-8 order-lg-2 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter">
            <div class="overflow-hidden mb-2">
              <h2 class="text-color-primary font-weight-bold text-7 mb-0">Excellence in Cleaning Since 2004</h2>
            </div>
            <div class="overflow-hidden mb-4">
              <p class="lead mb-0">Setting the Standard for Professional Cleaning Services in Ottawa</p>
            </div>
            <p class="custom-text-size-1">Founded with a vision to revolutionize the cleaning industry, Brightbell has grown from a small local business to Ottawa's premier cleaning service provider. Our journey is marked by unwavering commitment to quality, innovation, and customer satisfaction.</p>
          </div>
          <div class="col-lg-4 order-lg-1 appear-animation" data-appear-animation="fadeInRightShorter">
            <div class="timeline-date">
              <h4 class="text-color-dark font-weight-bold">Our Journey</h4>
              <div class="timeline-box">
                <div class="timeline-item">
                  <h4 class="text-color-dark font-weight-bold">2004</h4>
                  <p>Company Founded</p>
                </div>
                <div class="timeline-item">
                  <h4 class="text-color-dark font-weight-bold">2010</h4>
                  <p>Expanded to Commercial Services</p>
                </div>
                <div class="timeline-item">
                  <h4 class="text-color-dark font-weight-bold">2015</h4>
                  <p>Green Cleaning Certification</p>
                </div>
                <div class="timeline-item">
                  <h4 class="text-color-dark font-weight-bold">2024</h4>
                  <p>Leading Ottawa's Cleaning Industry</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Values Section -->
    <section class="section section-with-shape-divider bg-tertiary border-0 m-0">
      <div class="container">
        <div class="row align-items-center justify-content-center py-5">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h3 class="text-color-light font-weight-bold text-8 mb-4">Our Core Values</h3>
            <div class="values-grid">
              <div class="value-item appear-animation" data-appear-animation="fadeInUpShorter">
                <i class="fas fa-check-circle text-color-light"></i>
                <h4 class="text-color-light">Excellence</h4>
                <p class="text-color-light opacity-7">Delivering superior quality in every service</p>
              </div>
              <div class="value-item appear-animation" data-appear-animation="fadeInUpShorter">
                <i class="fas fa-leaf text-color-light"></i>
                <h4 class="text-color-light">Sustainability</h4>
                <p class="text-color-light opacity-7">Eco-friendly cleaning solutions</p>
              </div>
              <div class="value-item appear-animation" data-appear-animation="fadeInUpShorter">
                <i class="fas fa-users text-color-light"></i>
                <h4 class="text-color-light">Integrity</h4>
                <p class="text-color-light opacity-7">Honest and transparent service</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <img src="{{ basset('frontend/img/demos/cleaning-services/about/values.jpg') }}" class="img-fluid rounded" alt="Our Values">
          </div>
        </div>
      </div>
    </section>

    <!-- Certifications -->
    <section class="section border-0 m-0">
      <div class="container py-5">
        <div class="row justify-content-center text-center mb-4">
          <div class="col-lg-8">
            <h3 class="text-color-secondary font-weight-bold text-8 mb-3">Our Certifications</h3>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="owl-carousel owl-theme nav-outside nav-arrows-1" data-plugin-options="{'items': 4, 'loop': true, 'nav': true, 'dots': false}">
              <!-- Add certification logos here -->
              <div class="certification-item">
                <img src="{{ basset('frontend/img/demos/cleaning-services/certifications/cert1.png') }}" alt="Certification 1">
                <h5>Green Cleaning Certified</h5>
              </div>
              <!-- Add more certification items -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="section section-with-shape-divider section-height-3 bg-tertiary border-0 m-0">
      <div class="container py-3">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-9 col-lg-7 col-xl-9">
            <h2 class="text-color-light font-weight-bold text-9 mb-3">Experience the Brightbell Difference</h2>
            <p class="custom-font-secondary text-4 text-color-light opacity-7">Join thousands of satisfied customers who trust us with their cleaning needs</p>
            <a href="{{ route('contact') }}" class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3 appear-animation" data-appear-animation="fadeInUpShorter">GET STARTED</a>
          </div>
        </div>
      </div>
    </section>
  </div>
</x-frontend>

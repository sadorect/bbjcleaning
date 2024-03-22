<x-frontend>

  <style>
    /* Tooltip container */
    .tooltipz {
      position: relative;
      display:block;
    }
  
    /* Tooltip text */
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
      transform: translateX(-50%); /* Center tooltip horizontally */
      opacity: 0; /* Start with opacity 0 */
      transition: opacity 0.3s; /* Add transition effect */
    }
  
    /* Show the tooltip text when you mouse over the tooltip container */
    .tooltipz:hover .tooltipztext {
      visibility: visible;
      opacity: 1; /* Show tooltip with opacity transition */
    }
  </style>
  


  <div role="main" class="main">

    <section class="page-header page-header-modern page-header-lg bg-tertiary border-0 my-0">
      <div class="container my-3">
        <div class="row">
          <div class="col-md-12 align-self-center p-static order-2 text-center">
            <h1 class="font-weight-bold text-10">Services</h1>
          </div>
          <div class="col-md-12 align-self-center order-1">
            <ul class="breadcrumb breadcrumb-light d-block text-center">
              <li><a href="#">Home</a></li>
              <li class="active">Services</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="section border-0 pb-0 pb-lg-5 m-0">
      <div class="container my-lg-4">
        <div class="row">
          <div class="col-lg-8 order-lg-2 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
            <p class="custom-font-secondary text-4 mb-4">Get reliable & affordable cleaning services for your facility with a 100% satisfaction guaranteed! </p>
            <p>We operate in Ottawa and provide a variety of cleaning services. Choose us because of our reputation for excellence. We provide proffesional cleaning services designed to keep your home sparkling and beautiful so that you can focus on things that matter more to you. </p>
            <img src="{{ basset('frontend/img/demos/cleaning-services/services/house-cleaning.jpg') }}"  class="img-fluid float-start custom-max-width-1 my-3 me-4" alt="" />
            <p class="mt-5">Our continuous pursuit for perfection has resulted in consistent growth each year. Our focus is to listen to our clients, understand their needs and provide the exceptional level of residential and commercial cleaning services. </p>
            
            <p>If for any reason you aren't happy with our cleaning services please contact us. We will come back and clean the specific areas that didn't meet. In case you need a special cleaning service we are happy to fulfill every request in order to exceed your expectations. </p>
            <img src="{{ basset('frontend/img/demos/cleaning-services/services/post-renovation.jpg') }}"  class="img-fluid float-end custom-max-width-1 my-3 ms-4" alt="" />
            <h3 class="font-weight-bold text-10">Our Mission</h3>
            <p class="pt-3 mt-5">Founded in 1995 we became one of the leading providers of residential and commercial cleaning solutions in Canada and United States. Our mission is to:
               </p>
            <ul class="list list-icons list-icons-style-2 list-icons-lg custom-list-icons-icon-size pb-1 mb-0">
              <li class="font-weight-semibold text-color-dark mb-3"><i class="fas fa-check text-color-dark border-color-grey-1 top-7"></i> Deliver high quality and consistent services.</li>
              <li class="font-weight-semibold text-color-dark mb-3"><i class="fas fa-check text-color-dark border-color-grey-1 top-7"></i> Use environmentall friendly cleaning products.</li>
              <li class="font-weight-semibold text-color-dark mb-3"><i class="fas fa-check text-color-dark border-color-grey-1 top-7"></i> Provide stable jobs with resonable wages.</li>
              <li class="font-weight-semibold text-color-dark mb-3"><i class="fas fa-check text-color-dark border-color-grey-1 top-7"></i> Concentrate our resources on maintaining standards.</li>
              <li class="font-weight-semibold text-color-dark mb-3"><i class="fas fa-check text-color-dark border-color-grey-1 top-7"></i> Make you an extremely satisfied customer.</li>
            </ul>
            
          </div>
          <div class="col-lg-4 order-lg-1">
            <div class="card custom-border-radius-1 box-shadow-1 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
              <div class="card-body py-5">
                <h2 class="text-color-secondary font-weight-bold text-6 line-height-1 pb-2 mb-4">All Services</h2>
                <ul class="list list-unstyled custom-nav-list-effect-1 mb-0">
                  <li class="active pb-1 mb-3 tooltipz"><a  class="text-decoration-none  text-color-dark text-color-hover-primary  font-weight-bold custom-font-size-3">Building Services</a><span class="tooltipztext">Maintain your building's appeal effortlessly. We offer cleaning and maintenance solutions for commercial and residential properties.</span></li>
                  <li class="active pb-1 mb-3 tooltipz"><a  class="text-decoration-none  text-color-dark text-color-hover-primary font-weight-bold custom-font-size-3">Office Cleaning</a><span class="tooltipztext">Boost productivity in a clean workspace. We handle everything from desks to restrooms for a professional environment.</span></li>
                  <li class="active pb-1 mb-3 tooltipz"><a  class="text-decoration-none  text-color-dark text-color-hover-primary font-weight-bold custom-font-size-3">Post Construction</a><span class="tooltipztext">Freshen up after renovations. We'll clear away construction mess, leaving your space spotless.</span></li>
                   <li class="active mb-0 tooltipz"><a  class="text-decoration-none  text-color-dark text-color-hover-primary font-weight-bold custom-font-size-3">Residential Cleaning</a><span class="tooltipztext">Enjoy a tidy home hassle-free. Our experts ensure every corner is clean, so you can relax and unwind.</span></li>
                </ul>
              </div>
            </div>
            <div class="card custom-border-radius-1 box-shadow-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
              <div class="card-body py-5">
                <h2 class="text-color-secondary font-weight-bold text-6 line-height-1 pb-1 mb-2">Request a Callback</h2>
                <p class="custom-font-secondary text-4 pb-1 mb-4">Enter your details in the form and we will call you back.</p>
                <form class="contact-form custom-form-style-1" action="php/contact-form.php" method="POST">
                  <div class="contact-form-success alert alert-success d-none mt-4">
                    <strong>Success!</strong> Your request has been sent to us.
                  </div>

                  <div class="contact-form-error alert alert-danger d-none mt-4">
                    <strong>Error!</strong> There was an error sending your request.
                    <span class="mail-error-message text-1 d-block"></span>
                  </div>

                  <div class="row">
                    <div class="form-group col pb-1 mb-3">
                      <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" placeholder="Your Name" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col pb-1 mb-3">
                      <input type="text" value="" data-msg-required="Please enter your phone number." maxlength="100" class="form-control" name="phone" placeholder="Your Phone Number" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col pb-1 mb-3">
                      <div class="custom-select-1">
                        <select data-msg-required="Please select a service." class="form-control" name="service" required>
                          <option value="" selected>Select Service</option>
                          <option value="Build Services">Building Services</option>
                          <option value="Post Construction">Post Construction</option>
                          <option value="Office Cleaning">Office Cleaning</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col">
                      <button type="submit" class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3" data-loading-text="Loading...">CALL ME BACK</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-with-shape-divider section-height-3 bg-tertiary border-0 m-0">
      <div class="shape-divider" style="height: 116px;">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 116" preserveAspectRatio="xMinYMin">
          <path class="custom-svg-fill-color-tertiary-darken" d="M0,24c2.86,0.42,7.41,1.1,13,2c6.13,0.98,10.67,1.77,12,2c11.67,2.01,42.24,7.05,68,11
            c7.79,1.2,22.72,3.48,41,6c20.75,2.86,38.83,5.06,74,9c41.19,4.61,62.09,6.95,93,10c57.4,5.66,101.17,9.03,114,10
            c9.13,0.69,40.29,3.02,109,7c48.33,2.8,87.04,5.04,132,7c76.86,3.35,135.02,4.27,184,5c104.27,1.56,187.39,0.71,234,0
            c21.92-0.34,91.62-1.5,183-5c50.62-1.94,106.43-4.12,181-9c57.01-3.73,108.05-7.94,152-12c94.91-8.78,162.37-17.44,182-20
            c41.76-5.45,72.06-10.09,96-14c21.23-3.47,39.04-6.63,52-9c0-11.67,0-23.33,0-35C1279-11,638-11-3-11C-2,0.67-1,12.33,0,24z"/>
          <path fill="#F4F4F4" d="M-7,23c1.59,0.23,4.03,0.58,7,1c82.06,11.6,145.17,16.35,182,19c244.62,17.62,377,23,377,23
            c157.86,6.42,277.64,7.71,308,8c75.8,0.73,232.89,1.31,438-6c0,0,137.72-4.66,358-19c42.98-2.8,104.01-7.03,183-16
            c33.26-3.78,60.85-7.38,80-10c0-9.01,0-18.01,0-27.02c-644,0-1288,0-1932,0C-6.33,4.99-6.67,13.99-7,23z"/>
        </svg>
      </div>
      <div class="container pt-4 pb-3 mt-5">
        <div class="row align-items-center justify-content-center pt-3">
          <div class="col-md-9 col-lg-7 col-xl-9 text-center text-xl-start mb-4 mb-xl-0">
            <h2 class="text-color-light font-weight-medium line-height-4 text-9 negative-ls-1 mb-2">For <span class="font-weight-extra-bold custom-highlight-1 p-1 appear-animation" data-appear-animation="customHighlightAnim" data-appear-animation-delay="300">Residential and Commercial</span> Cleaning</h2>
            <p class="custom-font-secondary custom-font-size-1 font-weight-light text-color-light opacity-8 mb-0">Our Staff is trained to clean everything you need!</p>
          </div>
          <div class="col-xl-3 text-center text-xl-end">
            <div class="position-relative">
              <a href="demo-cleaning-services-contact.html" class="btn btn-secondary btn-modern font-weight-bold text-3 btn-px-4 py-3">BOOK NOW IN 60 SECONDS</a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

</x-frontend>
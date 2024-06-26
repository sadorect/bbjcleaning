<x-frontend>

  <div role="main" class="main">

    <section class="page-header page-header-modern page-header-lg bg-tertiary border-0 my-0">
      <div class="container my-3">
        <div class="row">
          <div class="col-md-12 align-self-center p-static order-2 text-center">
            <h1 class="font-weight-bold text-10">Contact</h1>
          </div>
          <div class="col-md-12 align-self-center order-1">
            <ul class="breadcrumb breadcrumb-light d-block text-center">
              <li><a href="#">Home</a></li>
              <li class="active">Contact</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="section border-0 py-0 m-0">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="row py-5 my-5">
              <div class="col-md-6">
                <h2 class="font-weight-bold text-color-secondary text-6 text-lg-5 text-xl-6 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">Get In Touch</h2>
                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
                  <h3 class="font-weight-bold text-color-secondary text-transform-none text-4 text-lg-3 mb-0">Work Inquiries</h3>
                  <a href="tel:+12046887777" class="d-inline-block text-color-default text-color-hover-primary text-decoration-none mb-4">+1204 688 7777</a>
                </div>
                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
                  <h3 class="font-weight-bold text-color-secondary text-transform-none text-4 text-lg-3 mb-0">Careers & Press</h3>
                  <a href="tel:+12046887777" class="d-inline-block text-color-default text-color-hover-primary text-decoration-none mb-4">+1 204 688 7777</a>										
                </div>
                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
                  <h3 class="font-weight-bold text-color-secondary text-transform-none text-4 text-lg-3 mb-0">Assistance Hours</h3>
                  <p>Mon - Sun 9:00am - 8:00pm</p>
                </div>
              </div>
              <div class="col-md-6">
                <h2 class="font-weight-bold text-color-secondary text-6 text-lg-5 text-xl-6 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100">Post Address and Mail</h2>
                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300">
                  <h3 class="font-weight-bold text-color-secondary text-transform-none text-4 text-lg-3 mb-0">Address</h3>
                  <p>12345 Porto Blvd. <br>Suite 1500 <br>Los Angeles, California 90000</p>
                </div>
                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500">
                  <h3 class="font-weight-bold text-color-secondary text-transform-none text-4 text-lg-3 mb-0">Email</h3>
                  <a href="mailto:info@brightbelljanitors.com" class="text-color-default text-color-hover-primary text-decoration-underline mb-4">info@brightbelljanitors.com</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 fluid-col-lg-5 p-0">
            <div class="fluid-col h-100">

              <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
              <div id="googlemaps" class="google-map h-100 m-0" style="min-height: 400px;"></div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container py-5 mt-5">
      <div class="row pb-2 mb-4">
        <div class="col">
          <div class="d-flex align-items-center mb-2">
            <span class="custom-line appear-animation" data-appear-animation="customLineAnimation" appear-animation-duration="1s"></span>
            <div class="overflow-hidden ms-3">
              <h2 class="text-color-primary font-weight-semibold line-height-3 text-4 mb-0 appear-animation" data-appear-animation="maskRight" data-appear-animation-delay="1000">GET IN TOUCH</h2>
            </div>
          </div>
          <h3 class="text-color-secondary font-weight-bold text-transform-none line-height-2 text-8 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">Send Us a Message</h3>
        </div>
      </div>
      <div class="row pb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">
        <div class="col">
          <form class="contact-form custom-form-style-1" action="{{route('contactMail')}}" method="POST">
            @csrf
                            <div class="contact-form-success alert alert-success d-none mt-4">
                                <strong>Success!</strong> Your message has been sent to us.
                            </div>

                            <div class="contact-form-error alert alert-danger d-none mt-4">
                                <strong>Error!</strong> There was an error sending your message.
                                <span class="mail-error-message text-1 d-block"></span>
                            </div>

                            <div class="row row-gutter-sm">
                                <div class="form-group col-lg-6 mb-4">
                                    <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required placeholder="Your Name">
                                </div>
                                <div class="form-group col-lg-6 mb-4">
                                    <input type="text" value="" data-msg-required="Please enter your phone number." maxlength="100" class="form-control" name="phone" id="phone" required placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="row row-gutter-sm">
                                <div class="form-group col-lg-6 mb-4">
                                    <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required placeholder="Your Name">
                                </div>
                                <div class="form-group col-lg-6 mb-4">
                                    <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required placeholder="Subject">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col mb-4">
                                    <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required placeholder="Your Message"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col mb-0">
                                    <button type="reset" class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3" data-loading-text="Loading...">SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>
        </div>
      </div>
    </div>

  </div>

</x-frontend>
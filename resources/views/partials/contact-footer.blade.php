<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row py-4">
            <!-- Address Column -->
            <div class="col-md-4 col-lg-3 mb-4 mb-lg-0">
                <h4 class="fw-bold mb-3">Our Address</h4>
                <ul class="list-unstyled">
                    <li class="mb-1">511-44 The Promenade street</li>
                    <li class="mb-1">Winnipeg</li>
                    <li> MB R3B 3H9 Canada</li>
                </ul>
            </div>
            
            
           
            <!-- Contact Column -->
            <div class="col-md-4 col-lg-3 mb-4 mb-lg-0">
                <h4 class="fw-bold mb-3">Our Contacts</h4>
                <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                        <img width="45" src="{{ asset('frontend/img/demos/cleaning-services/icons/phone.svg') }}" alt="phone">
                    </div>
                    <div>
                        <p class="text-uppercase fw-semibold small mb-0">CALL US NOW</p>
                        <a href="tel:+12046887777" class="text-white text-decoration-none fs-4 fw-bold">+1204 688 7777</a>
                    </div>
                </div>
                <a href="{{route('booking.public')}}" class="btn btn-primary fw-bold px-4 py-2">BOOK NOW</a>
            </div>

            <!-- Services Column -->
            <div class="col-md-4 col-lg-2 mb-4 mb-md-0">
                <h4 class="fw-bold mb-3">Our Services</h4>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{route('services')}}" class="text-white text-decoration-none">Building Services</a></li>
                    <li class="mb-2"><a href="{{route('services')}}" class="text-white text-decoration-none">Post Construction</a></li>
                    <li><a href="{{route('services')}}" class="text-white text-decoration-none">Office Cleaning</a></li>
                </ul>
                <a href="{{route('services')}}" class="btn btn-link text-white text-decoration-none p-0">VIEW MORE</a>
            </div>

            <!-- About Column -->
            <div class="col-md-4 col-lg-2 mb-4 mb-md-0">
                <h4 class="fw-bold mb-3">About</h4>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{route('about')}}" class="text-white text-decoration-none">About Us</a></li>
                    <li><a href="{{route('contact')}}" class="text-white text-decoration-none">Send a Message</a></li>
                </ul>
            </div>

            <!-- Social Column -->
            <div class="col-md-4 col-lg-2">
                <h4 class="fw-bold mb-3">Follow Us</h4>
                <div class="social-icons">
                    <a href="https://www.instagram.com/" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="https://www.twitter.com/" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="https://www.facebook.com/" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="border-top border-secondary mt-4">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-6 text-center text-lg-start mb-3 mb-lg-0">
                    <a href="/">
                        <img alt="BBJ" width="150" height="70" src="{{asset('frontend/img/logos/brightbell.png')}}" >
                    </a>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <p class="mb-0">Brightbell Janitors. © {{ date('Y')}}. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>



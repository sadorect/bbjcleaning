<footer id="footer" class="border-0">
    <div class="container py-4">
        <div class="row py-5">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Contact Details</h5>
                <p class="text-4 mb-1">Winnipeg, Manitoba</p>
                <p class="text-4 mb-4 pb-1">Canada</p>
                <p class="text-4 mb-1">Phone: <a href="tel:+12046887777" class="text-decoration-none">+1204 688 7777</a></p>
                <p class="text-4 mb-0">Email: <a href="mailto:info@brightbelljanitors.com" class="text-decoration-none">info@brightbelljanitors.com</a></p>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Quick Links</h5>
                <ul class="list list-icons list-icons-sm">
                    <li><i class="fas fa-angle-right"></i><a href="/" class="link-hover-style-1 ms-1">Home</a></li>
                    <li><i class="fas fa-angle-right"></i><a href="{{ route('about') }}" class="link-hover-style-1 ms-1">About Us</a></li>
                    <li><i class="fas fa-angle-right"></i><a href="{{ route('services') }}" class="link-hover-style-1 ms-1">Services</a></li>
                    <li><i class="fas fa-angle-right"></i><a href="{{ route('contact') }}" class="link-hover-style-1 ms-1">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-5">
                <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Business Hours</h5>
                <p class="text-4 mb-0">Our support available to help you 24 hours a day. We provide our best.</p>
                <p class="text-4 mb-0">Monday-Sunday: 9:00 AM to 8:00 PM</p>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container py-2">
            <div class="row py-4">
                <div class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                </div>
                <div class="col-lg-11 d-flex align-items-center justify-content-center justify-content-lg-end mb-4 mb-lg-0">
                    <p>© Copyright {{ date('Y') }}. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

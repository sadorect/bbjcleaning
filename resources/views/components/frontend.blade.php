<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		@php
		if (request()->is('about')) {
				$subTitle = '| ABOUT US';
		} elseif (request()->is('contact')) {
			$subTitle = '| CONTACT';
		} elseif (request()->is('services')) {
			$subTitle = '| SERVICES';
		} else {
			$subTitle = '';
		}
@endphp
		<title>Brightbell Cleaning Services | {{ $subTitle }}</title>	

		<meta name="keywords" content="cleaning services" />
		<meta name="description" content="Brightbell Janitors cleaning services">
		<meta name="author" content="Brightbell Janitors">
		

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('frontend/img/favicon.ico') }}" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{ asset('frontend/img/apple-touch-icon.png') }}" >

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CRoboto+Slab:300,400,700,900&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/vendor/magnific-popup/magnific-popup.min.css') }}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/css/theme.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/theme-elements.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/theme-blog.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/theme-shop.css') }}">

		<!-- Demo CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/css/demos/demo-cleaning-services.css') }}">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="{{ asset('frontend/css/skins/skin-cleaning-services.css') }}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
		@if(request()->is('contact'))
		<link rel="stylesheet" href="{{ asset('frontend/css/contact-page.css') }}">
		@endif	
	</head>
	<body>

		<div class="body">
			<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 85}">
				<div class="header-body header-body-bottom-border border-top-0">
					<div class="header-top header-top-bottom-containered-border pt-2">
						<div class="container">
							<div class="header-row">
								<div class="header-column justify-content-start">
									<div class="header-row">
										<ul class="header-social-icons social-icons social-icons-clean social-icons-medium position-relative right-7 d-none d-md-block ms-0">
											<li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
											<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
											<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
										</ul>
										<ul class="nav nav-pills position-relative bottom-1 ms-md-3">
											<li class="nav-item">
												<span class="d-flex align-items-center ws-nowrap text-color-secondary font-weight-medium text-3"><i class="icon-clock icons text-3 top-3 left-1 me-2 text-color-secondary font-weight-bold"></i> Mon - Sun 24/7</span>
											</li>
										</ul>
										<!-- Language Switcher -->
										
									</div>
								</div>
								<div class="header-column justify-content-end">
									<div class="header-row">
										<a href="{{route('booking.public')}}" class="custom-header-top-btn-style-1 btn btn-secondary font-weight-bold px-4 px-sm-5 py-3">BOOK NOW</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="{{ route('home')}}">
											<div style=" padding: 1px; display: inline-block;">
												<img src="{{asset('frontend/img/logos/brightbell.png') }}" class="img-fluid" width="150" height="80" alt="" />
										</div>
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-links">
										<div class="header-nav-main header-nav-main-text-capitalize header-nav-main-effect-2 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li><a href="{{ route('home')}}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
													<li><a href="{{ route('about')}}" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About</a></li>
													<li><a href="{{ route('services')}}" class="nav-link {{ request()->is('services') ? 'active' : '' }}">Services</a></li>
													
													<li><a href="{{ route('contact')}}" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
													<li><a href="{{ route('booking.public')}}" class="nav-link {{ request()->is('booking') ? 'active' : '' }}">Booking</a></li>
													<li><a href="{{ route('careers.public')}}" class="nav-link {{ request()->is('careers') ? 'active' : '' }}">Careers</a></li>
												</ul>
											</nav>
										</div>
									</div>
									<div class="feature-box feature-box-style-2 align-items-center ms-lg-4">
										<div class="feature-box-icon d-none d-sm-inline-flex">
											<img class="icon-animated" width="48" src="{{ asset('frontend/img/demos/cleaning-services/icons/phone.svg')}}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-tertiary position-relative bottom-3'}" />
										</div>
										<div class="feature-box-info ps-2">
											<p class="font-weight-semibold line-height-1 text-2 pb-0 mb-1">CALL US NOW</p>
											<a href="tel:+12046887777" class="text-color-tertiary text-color-hover-primary text-decoration-none font-weight-bold line-height-1 custom-font-size-1 pb-0">+1 204 688 7777</a>
										</div>
									</div>
									<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
										<i class="fas fa-bars"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>


{{$slot}}



<footer id="footer" class="footer-reveal bg-color-secondary border-0 mt-0">
  <div class="container container-xl-custom pt-4 pb-3">
    <div class="row py-5">
      <div class="col-md-4 col-lg-3 mb-4 mb-lg-0">
        <h4 class="font-weight-bold ls-0">Our Address</h4>
        <ul class="list list-unstyled mb-0">
          <li class="mb-1">
            511-44 The Promenade street 
          </li>
          <li class="mb-1">
            Winnipeg
          </li>
          <li class="mb-0">
            MB R3B 3H9 Canada
          </li>
        </ul>
      </div>
      <div class="col-md-4 col-lg-3 mb-4 mb-lg-0">
        <h4 class="font-weight-bold ls-0">Our Contacts</h4>
        <div class="feature-box feature-box-style-2 align-items-center mb-3">
          <div class="feature-box-icon">
            <img class="icon-animated" width="45" src="{{ asset('frontend/img/demos/cleaning-services/icons/phone.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light'}" />
          </div>
          <div class="feature-box-info ps-2">
            <p class="text-uppercase font-weight-semibold line-height-1 text-2 pb-0 mb-0">CALL US NOW</p>
            <a href="tel:+12046887777" class="text-uppercase text-color-light text-color-hover-secondary text-decoration-none text-5 font-weight-bold pb-0">+1204 688 7777</a>
          </div>
        </div>
        <a href="{{route('booking.public')}}" class="btn btn-primary font-weight-bold px-5 py-3 mb-2">BOOK NOW</a>
      </div>
      <div class="col-md-4 col-lg-2 mb-4 mb-md-0">
        <h4 class="font-weight-bold ls-0">Our Services</h4>
        <ul class="list-unstyled mb-0">
          <li class="mb-1">
            <a href="{{route('services')}}">Building Services</a>
          </li>
          <li class="mb-1">
            <a href="{{route('services')}}">Post Construction</a>
          </li>
          <li class="mb-0">
            <a href="{{route('services')}}">Office Cleaning</a>
          </li>
        </ul>
        <a href="{{route('services')}}" class="btn btn-link font-weight-bold text-decoration-none ps-0">VIEW MORE</a>
      </div>
      <div class="col-md-4 col-lg-2 mb-4 mb-md-0">
        <h4 class="font-weight-bold ls-0">About</h4>
        <ul class="list-unstyled mb-0">
          <li class="mb-1">
            <a href="{{route('about')}}">About Us</a>
          </li>
          <li class="mb-0">
            <a href="{{route('contact')}}">Send a Message</a>
          </li>
        </ul>
      </div>
      <div class="col-md-4 col-lg-2">
        <h4 class="font-weight-bold ls-0">Follow Us</h4>
        <ul class="social-icons social-icons-clean social-icons-medium">
          <li>
            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
          </li>
          <li>
            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
          </li>
          <li>
            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright bg-color-secondary">
    <div class="container container-xl-custom pb-4">
      <div class="row">
        <div class="col opacity-3">
          <hr class="my-0 bg-color-light opacity-1">
        </div>
      </div>
      <div class="row py-4 mt-2">
        <div class="col-lg-6 text-center text-lg-start mb-3 mb-lg-0">
          <a href="/">
            <img alt="BBJ" width="150" height="70" src="{{asset('frontend/img/logos/brightbell.png') }}" >
          </a>
        </div>
        <div class="col-lg-6 text-center text-lg-end">
          <p class="text-3 mb-0">Brightbell Janitors. © {{ date('Y')}}. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </div>
</footer>
</div>

<!-- Vendor -->
@if(!Request::is('contact'))
<script src="{{ asset('frontend/vendor/plugins/js/plugins.min.js')}}"></script>
@endif

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('frontend/js/theme.js')}}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{ asset('frontend/js/views/view.contact.js')}}"></script>

<!-- Demo -->
<script src="{{ asset('frontend/js/demos/demo-cleaning-services.js')}}"></script>

<!-- Theme Custom -->
<script src="{{ asset('frontend/js/custom.js')}}"></script>

<!-- Theme Initialization Files -->
<script src="{{ asset('frontend/js/theme.init.js')}}"></script>

</body>
</html>

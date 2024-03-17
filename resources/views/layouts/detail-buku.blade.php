<!DOCTYPE html>
<html lang="en">

<head>
  <title>BookStore</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('frontend/css/open-iconic-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">

  <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

  <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

  <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css')}}">

  <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>

	@include('partials.navbar')

	<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('frontend/images/Hero.jpg') }});"
		data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
				<div class="col-md-9 ftco-animate pb-5">
					<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('userpage') }}">Home <i
									class="ion-ios-arrow-forward"></i></a></span> <span>Book details<i
								class="ion-ios-arrow-forward"></i></span></p>
					<h1 class="mb-3 bread">{{ $buku->judul_buku }}</h1>
				</div>
			</div>
		</div>
	</section>


	<section class="ftco-section contact-section">
		<div class="container">
		  <div class="row d-flex contact-info">
			<div class="col-md-10">
			  <div class="row mb-3">
				<div class="col-md-3 mb-3">
				  <div class="border p-4 rounded mb-2">
					<img class=" border img-display"
					src="{{ asset('storage/'.$buku->cover) }}">
					</img>
				  </div>
				</div>
				<div class="col-md-9">
				  <div class="px-4 rounded">
					@include('partials.caption')
					<p class="mb-0 d-block"><a href='{{ route('user.payment', $buku->id) }}' class="btn btn-primary px-5 py-2 mr-1">Buy</a></p>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </section>

	@include('partials.footer')



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" />
		</svg></div>


		<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
		<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
		<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
		<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('frontend/js/aos.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
		<script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
		<script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
		<script
		  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="{{ asset('frontend/js/google-map.js') }}"></script>
		<script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>
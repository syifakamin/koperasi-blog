<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ asset('assets/frontend/img/fav.png')}}">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->

	<style>
	.menu-sidebar-area {
		list-style-type:none; padding-left: 0; font-size: 15pt;
	}
	.menu-sidebar-area > li {
		margin:0 0 10px 0;
		list-style-position:inside;
		border-bottom: 1px solid black;
	}
	.menu-sidebar-area > li > a {
		color: black
	}
	</style>
	@yield('css')

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Font -->

  	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


    <!--
		    CSS
			  ============================================= -->
		  <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css')}}">
          <link rel="stylesheet" href="{{ asset('assets/frontend/css/linearicons.css')}}">
          <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css')}}">
          <link rel="stylesheet" href="{{ asset('assets/frontend/css/themify-icons.css')}}">
          <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css')}}">
          <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.css')}}">
          <link rel="stylesheet" href="{{ asset('assets/frontend/css/nouislider.min.css')}}">
          <link rel="stylesheet" href="{{ asset('assets/frontend/css/ion.rangeSlider.css')}}" />
          <link rel="stylesheet" href="{{ asset('assets/frontend/css/ion.rangeSlider.skinFlat.css')}}" />
          <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css')}}">
		  <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css')}}">
		  <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css')}}">
  	
    @stack('css')
    
</head>
<body>

    @include('layouts.frontend.partial.header')

    @yield('content')

    @include('layouts.frontend.partial.footer')

	<!-- SCIPTS -->
	<!-- new -->
	<script src="{{ asset('assets/frontend/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/popper.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/stellar.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/mail-script.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/theme.js') }}"></script>

	<!-- end new  -->


  	<script src="{{ asset('assets/frontend/js/jquery-3.1.1.min.js')}}"></script>

  	<script src="{{ asset('assets/frontend/js/tether.min.js')}}"></script>

  	<script src="{{ asset('assets/frontend/js/bootstrap.js')}}"></script>

    <script src="{{ asset('assets/frontend/js/home/scripts.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/home/swiper.js')}}"></script>

    
	<script src="{{ asset('assets/frontend/js/vendor/jquery-2.2.4.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="{{ asset('assets/frontend/js/vendor/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.sticky.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/nouislider.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/countdown.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="{{ asset('assets/frontend/js/gmaps.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/main.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js')}}"></script>
	@stack('js')
	
	@yield('javascript')

</body>
</html>

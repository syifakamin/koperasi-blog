<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Karyawan Sinar Mentari - Halaman Masuk</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
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
</head>
<body>
<section>
    <div class="container">
        <div class="row mt-5">
            <div class="offset-md-3 col-lg-6">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="login_form_inner">
                    <h3>Masuk</h3>
                    <form class="row login_form" action="{{ route('customer.post_login') }}" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="remember">
                                <label for="f-option2">Biarkan saya tetap masuk</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="btn submit_btn">Log in</button>
                            <a href="#">Lupa Password?</a>
                            <a href="{{ route('customer.register') }}" class="pb-5">Tidak punya akun ? Silahkan daftar di sini.</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
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
 
</body>
</html>
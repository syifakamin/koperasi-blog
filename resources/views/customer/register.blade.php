<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Karyawan Sinar Mentari Gresik - Daftar Customer</title>
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
<section id="title">

  

</section>
<section class="blog-area section">
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-md-12 col-sm-12">
        
            <div class="card shadow-lg">
                <div class="card-title">
                <h1 class="text-center mt-5"><b>DAFTAR</b></h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('customer.send.register') }}">
                        @csrf

                        <div class="form-group row mt-5">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Lengkap Anda. Contoh : Amin Syifa" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Surel Anda. Contoh : amin@amin.com" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-5 mt-5">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary container py-3">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <hr />

                    </form>
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

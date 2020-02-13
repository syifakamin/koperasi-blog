@extends('layouts.frontend.app')

@section('title','Login')

@push('css')
      <link href="{{ asset('assets/frontend/css/home/styles.css')}}" rel="stylesheet">

      <link href="{{ asset('assets/frontend/css/home/responsive.css')}}" rel="stylesheet">

@endpush

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h3>Login/Register</h3>
					<nav class="d-flex align-items-center page_link">
						<a href="{{ url ('/') }}">Halaman<span class="lnr lnr-arrow-right"></span></a>
						<a href="{{ route('customer.login')}}">Login</a>
					</nav>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<section class="login_box_area p_120">
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-lg-6">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                            <div class="login_form_inner">
                                <h3>Log in to Enter</h3>
                                <form class="row login_form" action="{{ route('customer.post_login') }}" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="col-md-12 forn-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email">
                                    </div>
                                    <div class="col-md-12 forn-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="*****">
                                    </div>
                                    <div class="col-md-12 forn-group">
                                        <div class="creat_account">
                                            <input type="checkbox" id="f-option2" name="remember">
                                            <label for="f-option2">Biarkan saya tetap masuk</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <button type="submit" value="submit" class="btn submit_btn">Log in</button>
                                        <a href="#">Lupa Password?</a>
                                    </div>
                                </form>
                            </div>
            </div>
        </div>
    </div>
</section>
@endsection
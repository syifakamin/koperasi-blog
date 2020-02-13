
	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('assets/frontend/img/logo.png')}}" alt="logo"></a>
					<li class="nav-item active"><a class="nav-link" href="{{ route('front.index') }}">Koperasi Karyawan Sinar Mentari UMG</a></li>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="{{ route('front.index') }}">Halaman Utama</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('front.product') }}">Produk</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('front.list_cart') }}"> belanjaMu </a></li>
							@if (auth()->guard('customer')->check())
							<li class="nav-item"><a class="nav-link" href="{{ route ('customer.logout') }}">logout</a></li>
							<li class="nav-item"><a class="nav-link" href="#">My Account</a></li>
							@else
							<li class="nav-item"><a class="nav-link" href="{{ route('customer.login') }}"> Login Customer </a></li>
							@endif
							<li class="nav-item"><li class="nav-item"><a class="nav-link" href="{{ route('front.contact') }}">Hubungi Kami</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->

	@push('js')

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="{{ asset('assets/frontend/js/gmaps.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/main.js')}}"></script>

@endpush
@extends('layouts.frontend.app')

@section('title','Dashbaord-User')

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
					<h3>Dashboard</h3>
					<nav class="d-flex align-items-center page_link">
						<a href="{{ url ('/') }}">Halaman<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Dashboard</a>
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
				<div class="col-md-3">
					@include('ecommerce.layout.frontend.partial.sidebar')
				</div>
				<div class="col-md-9">
                    <div class="row">
						<div class="col-md-4">
							<div class="card text-center">
								<div class="card-body">
									<h3>Belum Dibayar</h3>
									<hr>
									<p>Rp {{ number_format($orders[0]->pending) }}</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card text-center">
								<div class="card-body">
									<h3>Dikirim</h3>
									<hr>
									<p>{{ $orders[0]->shipping }} Pesanan</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card text-center">
								<div class="card-body">
									<h3>Selesai</h3>
									<hr>
									<p>{{ $orders[0]->completeOrder }} Pesanan</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@push('js')
<script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js')}}"></script>
@endpush
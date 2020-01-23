@extends('layouts.frontend.app')

@section('title','Koperasi Karyawan UMG')

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
					<h3>Keranjang Belanja</h3>
					<nav class="d-flex align-items-center page_link">
						<a href="{{ url ('/') }}">Halaman<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Keranjang Belanja</a>
					</nav>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<!--================Order Details Area =================-->
<section class="order_details p_120">
		<div class="container">
			<h3 class="title_confirmation">Terima kasih, pesanan anda telah kami terima.</h3>
			<div class="row order_d_inner">
				<div class="col-lg-6">
					<div class="details_item">
						<h4>Informasi Pesanan</h4>
						<ul class="list">
							<li>
								<a href="#">
                  <span>Invoice</span> : {{ $order->invoice }}</a>
							</li>
							<li>
								<a href="#">
                  <span>Tanggal</span> : {{ $order->created_at }}</a>
							</li>
							<li>
								<a href="#">
                  <span>Total</span> : Rp {{ number_format($order->subtotal) }}</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="details_item">
						<h4>Informasi Pemesan</h4>
						<ul class="list">
							<li>
								<a href="#">
                  <span>Alamat</span> : {{ $order->customer_address }}</a>
							</li>
							<li>
								<a href="#">
                  <span>Kota</span> : {{ $order->district->city->name }}</a>
							</li>
							<li>
								<a href="#">
									<span>Country</span> : Indonesia</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
  <!--================End Order Details Area =================-->
    

@endsection


@push('js')

@endpush

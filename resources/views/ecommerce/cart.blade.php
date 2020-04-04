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



    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
			<form action="{{ route('front.update_cart') }}" method="post">
                    @csrf
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
						<!-- Looping data dari variable carts -->
						@if(! empty($carts))
                        @forelse ($carts as $row)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex" style="max-width: 10%;">
                                            <img src="{{ asset('storage/products/' .$row['product_image']) }}" width="auto" height="auto" alt="{{ $row['product_name'] }}">
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $row['product_name'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>Rp {{ number_format($row['product_price']) }}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                     					<input type="text" name="qty[]" id="sst{{ $row['product_id'] }}" maxlength="12" value="{{ $row['qty'] }}" title="Quantity:" class="input-text qty">
                                        <input type="hidden" name="product_id[]" value="{{ $row['product_id'] }}" class="form-control"> 
										<button onclick="var result = document.getElementById('sst{{ $row['product_id'] }}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
										 class="increase items-count" type="button">
											<i class="lnr lnr-chevron-up"></i>
										</button>
										<button onclick="var result = document.getElementById('sst{{ $row['product_id'] }}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
										 class="reduced items-count" type="button">
											<i class="lnr lnr-chevron-down"></i>
										</button>
									</div>
								</td>
								<td>
                                    <h5>Rp {{ number_format($row['product_price'] * $row['qty']) }}</h5>
								</td>
							</tr>
							@empty
                            <tr>
                                <td colspan="4">Tidak ada belanjaan</td>
                            </tr>
							@endforelse
							@endif
							<tr class="bottom_button">
								<td>
									<button class="btn btn-primary waves-effect">Update</button>
								</td>
								<td></td>
								<td></td>
								<td></td>
                            </tr>
                            </form>
							<tr>
								<td>

								</td>
								<td>

								</td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td>
                                    <h5>Rp {{ number_format($subtotal) }}</h5>
								</td>
							</tr>
							<tr class="out_button_area">
								<td></td>
								<td></td>
								<td></td>
								<td>
									<div class="checkout_btn_inner">
										<a class="btn btn-secondary waves-effect" href="{{ route('front.product') }}">Kembali Belanja</a>
										<a class="btn btn-success waves-effect" href="{{ route('front.checkout') }}">Checkout</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection


@push('js')
<script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js')}}"></script>
@endpush

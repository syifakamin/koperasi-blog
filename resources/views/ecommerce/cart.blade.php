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
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
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
                                        <div class="d-flex">
                                            <img src="{{ asset('storage/products/' .$row['product_image']) }}" width="100px" height="100px" alt="{{ $row['product_name'] }}">
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
                    <!-- PERHATIKAN BAGIAN INI, NAMENYA KITA GUNAKAN ARRAY AGAR BISA MENYIMPAN LEBIH DARI 1 DATA -->
                     					<input type="text" name="qty[]" id="sst{{ $row['product_id'] }}" maxlength="12" value="{{ $row['qty'] }}" title="Quantity:" class="input-text qty">
                                        <input type="hidden" name="product_id[]" value="{{ $row['product_id'] }}" class="form-control"> 
                    <!-- PERHATIKAN BAGIAN INI, NAMENYA KITA GUNAKAN ARRAY AGAR BISA MENYIMPAN LEBIH DARI 1 DATA -->
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
									<button class="btn btn-primary waves-effect">Update Cart</button>
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
							{{-- <tr class="shipping_area">
								<td></td>
								<td></td>
								<td>
									<h5>Shipping</h5>
								</td>
								<td>
									<div class="shipping_box">
										<ul class="list">
											<li>
												<a href="#">Flat Rate: $5.00</a>
											</li>
											<li>
												<a href="#">Free Shipping</a>
											</li>
											<li>
												<a href="#">Flat Rate: $10.00</a>
											</li>
											<li class="active">
												<a href="#">Local Delivery: $2.00</a>
											</li>
										</ul>
										<h6>Calculate Shipping
											<i class="fa fa-caret-down" aria-hidden="true"></i>
										</h6>
										<select class="shipping_select">
											<option value="1">Bangladesh</option>
											<option value="2">India</option>
											<option value="4">Pakistan</option>
										</select>
										<select class="shipping_select">
											<option value="1">Select a State</option>
											<option value="2">Select a State</option>
											<option value="4">Select a State</option>
										</select>
										<input type="text" placeholder="Postcode/Zipcode">
										<a class="btn btn-primary waves-effect" href="#">Update Details</a>
									</div>
								</td>
							</tr> --}}
							<tr class="out_button_area">
								<td></td>
								<td></td>
								<td></td>
								<td>
									<div class="checkout_btn_inner">
										<a class="btn btn-secondary waves-effect" href="{{ route('front.product') }}">Continue Shopping</a>
										<a class="btn btn-success waves-effect" href="{{ route('front.checkout') }}">Proceed to checkout</a>
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

@endpush

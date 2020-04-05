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
					<h3>Checkout</h3>
					<nav class="d-flex align-items-center page_link">
						<a href="{{ url ('/') }}">Halaman<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Checkout</a>
					</nav>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3> Informasi Pengiriman </h3>
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form class="row contact_form" action="{{ route('front.store_checkout') }}" method="post" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group p_star">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form_control" id="first" name="customer_name" required>

                            <!-- untuk menampilkan jika terdapat error validasi -->
                            <p class="text-danger">{{ $errors->first('customer_name')}}</p>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">No Telp</label>
                            <input type="text" class="form-control" id="number" name="customer_phone" required>
                            <p class="text-danger">{{ $errors->first('customer_phone')}} </p>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">E-Mail</label>
                            <input type="email" class="form-control" id="email" name="email" require>
                            <p class="text-danger">{{ $errors->first('email')}} </p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Alamat Lengkap</label>
                            <input type="text" class="form-control" id="add1" name="customer_address" required>
                            <p class="text-danger">{{ $errors->first('customer_address')}} </p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Propinsi</label>
                            <select type="form-control" class="form-control province_id" name="province_id" id="province_id" >
                                <option value="">Pilih Propinsi</option>
                                @foreach ($provinces as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <ul class="text-danger">{{ $errors->first('province_id')}}</ul>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Kabupaten / kota</label>
                            <select type="form-control" class="city_id" name="city_id" id="city_id">
                                <option value="">Pilih Kabupaten/kota</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('city_id')}}</p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Kecamatan</label>
                            <select type="form-control" class="district_id" name="district_id" id="district_id" >
                                <option value="">Pilih Kecamatan</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('district_id')}}</p>
                        </div>
</div>
                            <div class="col-lg-4">
                                <div class="order_box">
                                    <h2>Ringkasan Pesanan</h2>
                                    <ul class="list">
                                        <li>
                                            <a href="#">Produk
                                                <span>Total</span>
                                            </a>
                                        </li>
                                        @foreach ($carts as $cart)
                                        <li>
                                            <a href="#">{{ \Str::limit($cart['product_name'], 10) }}
                                                <span class="middle">x {{$cart['qty']}}</span>
                                                <span class="last"> Rp {{number_format($cart['product_price']) }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <ul class="list list_2">
                                        <li>
                                            <a href="#">Subtotal
                                                <span> Rp {{ number_format($subtotal) }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Pengiriman
                                                <span> Rp 0</span>
                                            </a>
                                        </li>       
                                        <li>
                                            <a href="#">total
                                                <span> Rp {{ number_format($subtotal) }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <button class="btn-primary">Bayar Pesanan</button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
</section>

@endsection

@section('javascript')

<script>
       $('#province_id').on('change', function() {
            //MAKA AKAN MELAKUKAN REQUEST KE URL /API/CITY
            //DAN MENGIRIMKAN DATA PROVINCE_ID
            $.ajax({
                url: "{{ url('/api/city') }}",
                type: "GET",
                data: { province_id: $(this).val() },
                success: function(html){
                    //SETELAH DATA DITERIMA, SELEBOX DENGAN ID CITY_ID DI KOSONGKAN
                    $('.city_id').empty()
                    //KEMUDIAN APPEND DATA BARU YANG DIDAPATKAN DARI HASIL REQUEST VIA AJAX
                    //UNTUK MENAMPILKAN DATA KABUPATEN / KOTA
                    $('.city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function(key, item) {
                        $('.city_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })

        $('#city_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/district') }}",
                type: "GET",
                data: { city_id: $(this).val() },
                success: function(html){
                    $('#district_id').empty()
                    $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                    $.each(html.data, function(key, item) {
                        $('#district_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })
    </script>

@endsection

@push('js')

@endpush

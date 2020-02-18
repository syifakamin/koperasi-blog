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
						<a href="#">Setting User</a>
					</nav>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- End Banner Area -->


	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					@include('ecommerce.layout.frontend.partial.sidebar')
				</div>
				<div class="col-md-9">
          <div class="row">
						<div class="col-md-12">
							<div class="card">
                <div class="card-header">
                    <h4 class="card-title">Informasi Pribadi</h4>
                </div>
<div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('customer.setting') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" required value="{{ $customer->name }}">
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" required value="{{ $customer->email }}" readonly>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="******">
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                            <p>Biarkan kosong jika tidak ingin mengganti password</p>
                        </div>
                        <div class="form-group">
                            <label for="">No Telp</label>
                            <input type="text" name="phone_number" class="form-control" required value="{{ $customer->phone_number }}">
                            <p class="text-danger">{{ $errors->first('phone_number') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="address" class="form-control" required value="{{ $customer->address }}">
                            <p class="text-danger">{{ $errors->first('address') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Propinsi</label>
                            <select class="form-control" name="province_id" id="province_id" required>
                                <option value="">Pilih Propinsi</option>
                                @foreach ($provinces as $row)
                                <option value="{{ $row->id }}" {{ $customer->district->province_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('province_id') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Kabupaten / Kota</label>
                            <select class="form-control" name="city_id" id="city_id" required>
                                <option value="">Pilih Kabupaten/Kota</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('city_id') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <select class="form-control" name="district_id" id="district_id" required>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('district_id') }}</p>
                        </div>
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection


@section('js')
    <script>
        //JADI KETIKA HALAMAN DI-LOAD
        $(document).ready(function(){
            //MAKA KITA MEMANGGIL FUNGSI LOADCITY() DAN LOADDISTRICT()
            //AGAR SECARA OTOMATIS MENGISI SELECT BOX YANG TERSEDIA
            loadCity($('#province_id').val(), 'bySelect').then(() => {
                loadDistrict($('#city_id').val(), 'bySelect');
            })
        })

        $('#province_id').on('change', function() {
            loadCity($(this).val(), '');
        })

        $('#city_id').on('change', function() {
            loadDistrict($(this).val(), '')
        })

        function loadCity(province_id, type) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "{{ url('/api/city') }}",
                    type: "GET",
                    data: { province_id: province_id },
                    success: function(html){
                        $('#city_id').empty()
                        $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                        $.each(html.data, function(key, item) {
                            
                            // KITA TAMPUNG VALUE CITY_ID SAAT INI
                            let city_selected = {{ $customer->district->city_id }};
                           //KEMUDIAN DICEK, JIKA CITY_SELECTED SAMA DENGAN ID CITY YANG DOLOOPING MAKA 'SELECTED' AKAN DIAPPEND KE TAG OPTION
                            let selected = type == 'bySelect' && city_selected == item.id ? 'selected':'';
                            //KEMUDIAN KITA MASUKKAN VALUE SELECTED DI ATAS KE DALAM TAG OPTION
                            $('#city_id').append('<option value="'+item.id+'" '+ selected +'>'+item.name+'</option>')
                            resolve()
                        })
                    }
                });
            })
        }

        //CARA KERJANYA SAMA SAJA DENGAN FUNGSI DI ATAS
        function loadDistrict(city_id, type) {
            $.ajax({
                url: "{{ url('/api/district') }}",
                type: "GET",
                data: { city_id: city_id },
                success: function(html){
                    $('#district_id').empty()
                    $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                    $.each(html.data, function(key, item) {
                        let district_selected = {{ $customer->district->id }};
                        let selected = type == 'bySelect' && district_selected == item.id ? 'selected':'';
                        $('#district_id').append('<option value="'+item.id+'" '+ selected +'>'+item.name+'</option>')
                    })
                }
            });
        }
    </script>
@endsection
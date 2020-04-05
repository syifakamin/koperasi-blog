@extends('layouts.frontend.app')

@section('title','Koperasi Karyawan UMG')

@push('css')
      <link href="{{ asset('assets/frontend/css/home/styles.css')}}" rel="stylesheet">

      <link href="{{ asset('assets/frontend/css/home/responsive.css')}}" rel="stylesheet">

@endpush

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h3>Kategori Produk</h3>
					<nav class="d-flex align-items-center">
						<a href="index.html">Halaman<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Produk</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
    <!-- End Banner Area -->
    
    <div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Kategori Produk</div>
                    <!-- proses buat wideget category -->
                    <div class="main-nav-list">
                        <ul class="main-categories">

                        <!-- Proses Looping data Kategori -->
                        @foreach ($categories as $category)
                        <li class="main-nav-list">
                            <!-- Jika ada child, maka kategori akan mengexpand data dibawah -->
                            <a href="{{ $category->child_count > 0 ? '#':url('/category/' . $category->slug) }}">{{ $category->name }}</a>

                            <!-- Proses looping data child kategori -->
                            @foreach ($category->child as $child)
                            <ul class="main-nav-list">
                                <li class="main-nav-list">
                                    <a href="{{ url('/category/' . $child->slug) }}">{{$child->name }}</a>
                                </li>
                            </ul>
                            @endforeach
                        </li>
                        @endforeach
                        </ul>
                    </div>

				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">

				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
                    <div class="row">                
                    <!-- Proses Looping data produk, disamakan kode yang ada di halaman  -->     
                        @forelse ($products as $row) 
                            <div class="single-product col-lg-4 col-md-6">
                                <div class="f_p_item">
                                    <div class="f_p_img">
                                        <img class="img-fluid" src="{{ asset('storage/products/' . $row->image) }}" width="50%" height="50%" alt="{{ $row->name }}">
                                            <div class="p_icon">
                                                <a href="{{ url ('/product/' . $row->slug) }}">
                                                    <i class="lnr lnr-cart"></i>
                                                </a>
                                            </div>
                                    </div>
                                    <a href="{{ url('/product/' . $row->slug) }}">
                                        <h4>{{ $row->name }} </h4>
                                    </a>
                                    <h5>Rp {{ number_format($row->price) }}</h5>
                                </div>
                            </div>
                        
						@empty

						<div class="col-md-12">
						<h3 class="text-center">Tidak ada produk</h3>
						</div>

                        <!-- Proses Looping data product, sama dengan code yang ada di halaman -->
                        </div>
                        @endforelse
				</section>
                <!-- End Best Seller -->
                <!-- Generate Pagination Produk -->
                <div class="row">
                        {{ $products->links() }}
                    </div>
			</div>
		</div>
	</div>

@endsection


@push('js')
<script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('assets/frontend/js/home/scripts.js')}}"></script>
<script src="{{ asset('assets/frontend/js/home/swiper.js')}}"></script>
<script $(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});
</script>

@endpush

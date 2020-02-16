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
						<div class="col-md-12">
							<div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Pesanan</h4>
                </div>
								<div class="card-body">
									<div class="table-responsive">
                      <table class="table table-hover table-bordered">
                          <thead>
                              <tr>
                                  <th>Invoice</th>
                                  <th>Penerima</th>
                                  <th>No Telp</th>
                                  <th>Total</th>
                                  <th>Status</th>
                                  <th>Tanggal</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @forelse ($orders as $row) 
                              <tr>
                                  <td><strong>{{ $row->invoice }}</strong></td>
                                  <td>{{ $row->customer_name }}</td>
                                  <td>{{ $row->customer_phone }}</td>
                                  <td>{{ number_format($row->subtotal) }}</td>
                                  <td>{!! $row->status_label !!}</td>
                                  <td>{{ $row->created_at }}</td>
                                  <td>
                                      <a href="{{ route('customer.view_order', $row->invoice) }}" class="btn btn-primary btn-sm">Detail</a>
                                  </td>
                              </tr>
                              @empty
                              <tr>
                                  <td colspan="7" class="text-center">Tidak ada pesanan</td>
                              </tr>
                              @endforelse
                          </tbody>
                      </table>
                  </div>
                  <div class="float-right">
                      {!! $orders->links() !!}
                  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
@endsection
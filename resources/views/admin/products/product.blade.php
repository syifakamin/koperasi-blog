@extends('layouts.backend.app')

@section('title','Product Page')

@push('css')
      <link href="{{ asset('assets/frontend/css/home/styles.css')}}" rel="stylesheet">

      <link href="{{ asset('assets/frontend/css/home/responsive.css')}}" rel="stylesheet">

@endpush

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Product</li>
    </ol> 
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header bg-blue button-demo">
                            <h4>
                                List Product

                                <a href="{{ route('product.create') }}" class="btn btn-success waves-effect pull-right">Tambah</a>
                                <a href="{{ route('product.saveBulk') }}" class="btn btn-danger waves-effect pull-right">Mass Upload</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            

                            
                            <form action="{{ route('product.index') }}" method="get">
                                <div class="input-group mb-3 col-md-3 float-right">
                            
                                    <input type="text-placeholder" name="q" class="form-control" placeholder="Cari..." value="{{ request()->q }}">
                                        <button class="btn btn-secondary pull-right col-md-12" type="button">Cari</button>
                                </div>
                            </form>
                          
                            
                            <div class="table-striped">
                                <table class="table table-hover table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse ($product as $row)
                                        <tr>
                                            <td>
                                                
                                                <div style="max-width: 20%;">
                                                <img src="{{asset('storage/products/' . $row->image) }}" width="auto" height="auto" alt="{{ $row->name }}">
                                                </div>
                                            </td>
                                            <td>
                                                <strong>{{ $row->name }}</strong><br>
                                                
                                                <label>Kategori: <span class="badge badge-info">{{ $row->category->name }}</span></label><br>
                                                <label>Berat: <span class="badge badge-info">{{ $row->weight }} gr</span></label>
                                            </td>
                                            <td>Rp {{ number_format($row->price) }}</td>
                                            <td>{{ $row->created_at->format('d-m-Y') }}</td>
                                            
                                            
                                            <td>{!! $row->status_label !!}</td>
                                            <td>
                                                
                                                <div class="button-demo">
                                                <form action="{{ route('product.destroy', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('product.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            
                            {!! $product->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


@push('js')

<script src="{{ asset('assets/frontend/js/home/scripts.js')}}"></script>
<script src="{{ asset('assets/frontend/js/home/swiper.js')}}"></script>

@endpush

@extends('layouts.backend.app')

@section('title','Category Page')

@push('css')
      <link href="{{ asset('assets/frontend/css/home/styles.css')}}" rel="stylesheet">

      <link href="{{ asset('assets/frontend/css/home/responsive.css')}}" rel="stylesheet">

@endpush

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" >home</li>
        <li class="breadcrumb-item active">Kategori</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
              	
              	<!-- BAGIAN INI AKAN MENG-HANDLE FORM INPUT NEW CATEGORY  -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h4>Kategori Baru</h4>
                        </div>
                        <div class="body">
                                                
                            <form action="{{ route('category.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="name">Kategori</label>
                                        <input type="text" name="name" class="form-control" required>
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="parent_id" class="form-control">
                                                <option value="">None</option>
                                                @foreach ($parent as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br>
                                    <button class="btn btn-primary btn-sm">Tambah</button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- BAGIAN INI AKAN MENG-HANDLE FORM INPUT NEW CATEGORY  -->
              
                <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="header bg-blue">
                            <h4 class="card-title">List Kategori</h4>
                        </div>
                        <div class="card-body">
                          	<!-- KETIKA ADA SESSION SUCCESS  -->
                            @if (session('success'))
                              <!-- MAKA TAMPILKAN ALERT SUCCESS -->
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <!-- KETIKA ADA SESSION ERROR  -->
                            @if (session('error'))
                              <!-- MAKA TAMPILKAN ALERT DANGER -->
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kategori</th>
                                            <th>Parent</th>
                                            <th>Created At</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      	<!-- LOOPING DATA KATEGORI SESUAI JUMLAH DATA YANG ADA DI VARIABLE $CATEGORY -->
                                        @forelse ($category as $val)
                                        <tr>
                                            <td></td>
                                            <td><strong>{{ $val->name }}</strong></td>
                                          
                                          	<!-- MENGGUNAKAN TERNARY OPERATOR, UNTUK MENGECEK, JIKA $val->parent ADA MAKA TAMPILKAN NAMA PARENTNYA, SELAIN ITU MAKA TANMPILKAN STRING - -->
                                            <td>{{ $val->parent ? $val->parent->name:'-' }}</td>
                                          
                                            <!-- FORMAT TANGGAL KETIKA KATEGORI DIINPUT SESUAI FORMAT INDONESIA -->
                                            <td>{{ $val->created_at->format('d-m-Y') }}</td>
                                            <td>
                                              
                                                <!-- FORM ACTION UNTUK METHOD DELETE -->
                                                <form action="{{ route('category.destroy', $val->id) }}" method="post">
                                                    <!-- KONVERSI DARI @ CSRF & @ METHOD AKAN DIJELASKAN DIBAWAH -->
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('category.edit', $val->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- JIKA DATA CATEGORY KOSONG, MAKA AKAN DIRENDER KOLOM DIBAWAH INI  -->
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- FUNGSI INI AKAN SECARA OTOMATIS MEN-GENERATE TOMBOL PAGINATION  -->
                            {!! $category->links() !!}
                        </div>
                    </div>
                </div>
                <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
            </div>
        </div>
    </div>
</main>
@endsection


@push('js')

<script src="{{ asset('assets/frontend/js/home/scripts.js')}}"></script>
<script src="{{ asset('assets/frontend/js/home/swiper.js')}}"></script>

@endpush

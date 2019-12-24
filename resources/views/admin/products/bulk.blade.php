@extends('layouts.backend.app')

@section('title','Mass Upload Page')

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
            <form action="{{ route('product.saveBulk') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif

                            <div class="form-group">
                                <label for="category_id">Kategori</label>
                                <select name="category_id" class="form-control">
                                    <option value="">pilih</option>
                                    @foreach ($category as $row)
                                    <option value="{{ $row->id }}" {{old('category_id') == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('category_id') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="file">File Excel</label>
                                <input type="file" name="file" class="form-control" value="{{ old('file')}}" required>
                                <p class="text-danger">{{ $errors->first('file')}}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</main>
@endsection


@push('js')

<script src="{{ asset('assets/frontend/js/home/scripts.js')}}"></script>
<script src="{{ asset('assets/frontend/js/home/swiper.js')}}"></script>

@endpush

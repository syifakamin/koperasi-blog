@extends('layouts.backend.app')

@section('title','Edit Category Page')

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

        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}" require>
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control">{{ $product->description }} </textarea>
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" require>
                                    <option value="1" {{ $product->status == '1' ? 'selected':'' }}>publish</option>
                                    <option value="0" {{ $product->status == '0' ? 'selected':'' }}>draft</option>
                                </select>
                                <p class="text-danger">{{ $errors->first('status') }}/</p>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Kategori</label>
                                <select name="category_id" class="form-control" require>
                                    <option value="">Pilih</option>
                                    @foreach ($category as $row)
                                    <option value="{{ $row->id }}" {{ $product->category_id == $row->id ? 'select':'' }}>{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('category_id') }}/</p>
                            </div>
                            <div class="form-group">
                                <label for="price"> Harga </label>
                                <input type="number" name="price" class="form-control" value="{{ $product->price }}" require>
                                <p class="text-danger">{{ $errors->first ('price') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="price">harga</label>
                                <input type="number" name="price" class="form-control" value="{{ $product->price }}" require>
                                <p class="text-danger">{{ $errors->first('price') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="weight">Berat</label>
                                <input type="number" name="weight" class="form-control" value="{{ $product->weight }}" require>
                                <p class="text-danger">{{ $errors->first('weight') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="image">Foto Produk</label>
                                <br>

                                <img src="{{ asset('storage/product/' .$product->image) }}" width="100px" height="100px" alt="{{ $product->name }}">
                                <hr>
                                <input type="file" name="image" class="form-control">
                                <p><strong>Biarkan Kosong bila tidak ingin mengganti gambar</strong></p>
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Update</button>
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
<script src="http://cdn.ckeditor.com/4.13.0/standart/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
<script src="{{ asset('assets/frontend/js/home/scripts.js')}}"></script>
<script src="{{ asset('assets/frontend/js/home/swiper.js')}}"></script>

@endpush

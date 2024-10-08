@extends('layout')
@section('content')
  <h1 class="text-dark">Edit produk</h1>
  <form method="post" action="{{ route('products.update',$product->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="namaProduct" class="font-weight-bold">Nama Product</label><br>
      <input type="text" class="form-control" name="nama_produk" id="namaProduct" value="{{ $product->nama_produk }}" required><br>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
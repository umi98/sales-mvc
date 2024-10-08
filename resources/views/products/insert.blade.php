@extends('layout')
@section('content')
  <h1 class="text-dark">Create new produk</h1>
  <form method="post" action="{{ route('products.store') }}">
    @csrf
    <div class="form-group">
      <label for="namaProduk" class="font-weight-bold">Nama Produk</label><br>
      <input type="text" class="form-control" name="nama_produk" id="namaProduk" required><br>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
@extends('layout')
@section('content')
  <h1 class="text-dark">Produk</h1>
  <a href=" {{ route('products.create') }} " class="btn btn-primary mb-3">Create new produk</a>
  <br>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
      <th>ID Produk</th>
      <th>Produk</th>
      <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
          <td> {{ $product->id }} </td>
          <td> {{ $product->nama_produk }} </td>
          <td>
            <a href="{{ route( 'products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a> | 
            <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display:inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm delete-user">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
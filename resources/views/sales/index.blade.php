@extends('layout')
@section('content')
  <h1 class="text-dark">Sales</h1>
  <a href=" {{ route('sales.create') }} " class="btn btn-primary mb-3">Create new sales</a>
  <br>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
      <th>ID Sales</th>
      <th>Sales</th>
      <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sales as $sale)
      <tr>
          <td> {{ $sale->id }} </td>
          <td> {{ $sale->nama_sale }} </td>
          <td>
            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('sales.destroy', $sale->id) }}" method="post" style="display:inline">
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
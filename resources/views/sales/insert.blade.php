@extends('layout')
@section('content')
  <h1 class="text-dark">Create new sales</h1>
  <form method="post" action="{{ route('sales.store') }}">
    @csrf
    <div class="form-group">
      <label for="namaSales" class="font-weight-bold">Nama Sales</label><br>
      <input type="text" class="form-control" name="nama_sale" id="namaSales" required><br>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
@endsection
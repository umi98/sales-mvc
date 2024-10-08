@extends('layout')
@section('content')
  <h1 class="text-dark">Edit new leads</h1>
  <form method="post" action="{{ route('leads.update',$lead->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="tgl" class="font-weight-bold">Tanggal</label><br>
      <input type="date" class="form-control" name="tanggal" id="tgl" value="{{ $lead->tanggal }}" required><br>
    </div>
    <div class="form-group">
      <label for="idSales" class="font-weight-bold">Sales</label><br>
      <select class="form-control" name="id_sales" id="idSales">
        <option value="">--Pilih Sales--</option>
        @foreach ($sales as $sale)
        <option value="{{ $sale->id }}" {{ $sale->id == $lead->id_sales ? 'selected' : '' }}>{{ $sale->nama_sale }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="idProduct" class="font-weight-bold">Product</label><br>
      <select class="form-control" name="id_sales" id="idSales">
        <option value="">--Pilih Sales--</option>
        @foreach ($products as $product)
        <option value="{{ $product->id }}" {{ $product->id == $lead->id_produk ? 'selected' : '' }}>{{ $product->nama_produk }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="noWA" class="font-weight-bold">No. WhatsApp</label><br>
      <input type="text" class="form-control" name="no_wa" id="noWA" value="{{ $lead->no_wa }}" required><br>
    </div>
    <div class="form-group">
      <label for="namaLead" class="font-weight-bold">Nama Lead</label><br>
      <input type="text" class="form-control" name="nama_lead" id="namaLead" value="{{ $lead->nama_lead }}" required><br>
    </div>
    <div class="form-group">
      <label for="kota" class="font-weight-bold">Kota</label><br>
      <input type="text" class="form-control" name="kota" id="kota" value="{{ $lead->kota }}" required><br>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('leads.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
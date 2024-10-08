@extends('layout')
@section('content')
  <h1 class="text-dark">Leads</h1>
  <a href=" {{ route('leads.create') }} " class="btn btn-primary mb-3">Create new leads</a>
  <br>
  <!-- <form action="{{ route('leads.search') }}" method="GET" class="mb-4">
    <div class="input-group">
      <input type="text" name="query" class="form-control" placeholder="Cari apa saja..." aria-label="Cari leads">
      <button class="btn btn-outline-secondary" type="submit">Cari</button>
    </div>
  </form> -->
  <br>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
      <th>ID Leads</th>
      <th>Tanggal</th>
      <th>Sales</th>
      <th>Produk</th>
      <th>No. Whatsapp</th>
      <th>Lead</th>
      <th>Kota</th>
      <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @if ($leads->count())
      @foreach ($leads as $lead)
      <tr>
          <td> {{ $lead->id }} </td>
          <td> {{ $lead->tanggal }} </td>
          <td> {{ $lead->sales->nama_sale }} </td>
          <td> {{ $lead->products->nama_produk }} </td>
          <td> {{ $lead->no_wa }} </td>
          <td> {{ $lead->nama_lead }} </td>
          <td> {{ $lead->kota }} </td>
          <td>
            <a href="{{ route( 'leads.edit', $lead->id) }}" class="btn btn-warning btn-sm">Edit</a> | 
            <form action="{{ route('leads.destroy', $lead->id) }}" method="post" style="display:inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm delete-user">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
      @else
      <p>Tidak ada data</p>
      @endif
    </tbody>
  </table>
@endsection
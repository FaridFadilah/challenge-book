@extends('app')

@section('title', 'buku.index')
@section('content')
  <table border="1">
    <thead>
      <tr>
        <th>judul</th>
        <th>kategori</th>
        <th>foto</th>
        <th>penerbit</th>
        <th>qty</th>
        <th>isi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getBuku as $data)
      <tr>
        <th>{{ $data['nama'] }}</th>
        <th>{{ $data['kategori']['nama'] }}</th>
        <th>{{ $data['foto'] }}</th>
        <th>{{ $data['penerbit'] }}</th>
        <th>{{ $data['jml_buku'] }}</th>
        <th>{{ $data['isi'] }}</th>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
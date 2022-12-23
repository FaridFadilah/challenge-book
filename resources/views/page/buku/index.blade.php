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
        <th>author</th>
        <th>qty</th>
        <th>isi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getData as $data)
      <tr>
        <th>{{ $data['nama'] }}</th>
        <th>{{ $data['kategori']['nama'] }}</th>
        <th>{{ $data['foto'] }}</th>
        <th>{{ $data['penerbit'] }}</th>
        <th>{{ $data['author']['nama'] }}</th>
        <th>{{ $data['jml_buku'] }}</th>
        <th>{{ $data['isi'] }}</th>
      </tr>
      @endforeach
    </tbody>
  </table>

  <a href="{{ route('buku.create') }}">Tambah</a>
@endsection
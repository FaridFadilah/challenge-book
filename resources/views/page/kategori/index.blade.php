@extends('app')

@section('title', 'buku.index')
@section('content')
  <table border="1">
    <thead>
      <tr>
        <th>Nama</th>
        <th>deskripsi</th>
        <th>aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getData as $data)
      <tr>
        <th>{{ $data['nama'] }}</th>
        <th>{{ $data['deskripsi'] }}</th>
        <th> 
          <form action="{{ route('kategori.delete', $data['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('kategori.edit', $data['id']) }}">Ubah</a>
            <button type="submit">delete</button>
          </form>
        </th>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{ route('kategori.create') }}">Tambah</a>
@endsection
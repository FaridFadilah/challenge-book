@extends('app')

@section('title', 'author.index')
@section('content')
  <table border="1">
    <thead>
      <tr>
        <th>nama</th>
        <th>foto</th>
        <th>email</th>
        <th>deskripsi</th>
        <th>aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getData as $data)
      <tr>
        <th>{{ $data['nama'] }}</th>
        <th>
          <img src="{{ $data['foto'] }}" alt="{{ $data['foto'] }}">
        </th>
        <th>{{ $data['email'] }}</th>
        <th>{{ $data['deskripsi'] }}</th>
        <th>
          <form action="{{ route('author.delete', $data['id']) }}">
            <a href="{{ route('author.edit', $data['id']) }}">Ubah</a>
            <button type="submit">Delete</button>
          </form>
        </th>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{ route('author.create') }}">Tambah</a>
@endsection
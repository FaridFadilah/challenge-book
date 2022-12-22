@extends('app')

@section('title', 'author.index')
@section('content')
  <table border="1">
    <thead>
      <tr>
        <th>email</th>
        <th>nama</th>
        <th>foto</th>
        <th>deskripsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getData as $data)
      <tr>
        <th>{{ $data['nama'] }}</th>
        <th>{{ $data['foto'] }}</th>
        <th>{{ $data['email'] }}</th>
        <th>{{ $data['deskripsi'] }}</th>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
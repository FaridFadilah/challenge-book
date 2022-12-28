@extends('app')

@section('title', 'Kategori Edit')
@section('content')
  <form action="{{ route('author.update', $getData['id']) }}" method="POST">
    @csrf @method('PUT')
    <input type="text" name="nama" value="{{ $getData['nama'] }}">
    <input type="email" name="email" value="{{ $getData['email'] }}">
    <input type="file" name="foto" value="{{ $getData['foto'] }}">
    <textarea name="deskripsi">{{ $getData['deskripsi'] }}</textarea>
    <button type="submit">Kirim</button>
  </form>
@endsection
@extends('app')

@section('title', 'Kategori Edit')
@section('content')
  <form action="{{ route('kategori.update', $getData['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nama" value="{{ $getData['nama'] }}">
    <textarea name="deskripsi">{{ $getData['deskripsi'] }}</textarea>
    <button type="submit">Kirim</button>
  </form>
@endsection
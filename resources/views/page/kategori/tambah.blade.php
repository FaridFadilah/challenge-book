@extends('app')

@section('title', 'kategori Tambah')
@section('content')
  <form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <input type="text" name="nama">
    <textarea name="deskripsi"></textarea>
    <button type="submit">Kirim</button>
  </form>
@endsection
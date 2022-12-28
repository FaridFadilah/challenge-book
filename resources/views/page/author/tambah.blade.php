@extends('app')

@section('title', 'author Tambah')
@section('content')
  <form action="{{ route('author.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <input placeholder="nama" type="text" name="nama">
    <input placeholder="foto" type="file" name="foto">
    <input placeholder="email" type="email" name="email">
    <textarea placeholder="deskripsi" name="deskripsi"></textarea>
    <button type="submit">Kirim</button>
  </form>
@endsection
@extends('app')

@section('title', 'home')
@section('content')
  <a href="{{ route('buku.index') }}">Buku</a>
  <a href="{{ route('author.index') }}">Author</a>
  <a href="{{ route('buku.index') }}">kategori</a>
@endsection

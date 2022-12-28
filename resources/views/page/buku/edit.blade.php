@extends('app')

@section('title', 'Kategori Edit')
@section('content')
  <form enctype="multipart/form-data" action="{{ route('buku.update', $getData['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <select name="author_id" id="">
      @foreach($getAuthor as $data)
        <option value="{{ $data['id'] }}">{{ $data['nama'] }}</option>
      @endforeach 
    </select>
    <select name="kategori_id" id="">
      @foreach($getKategori as $data)
        <option value="{{ $data['id'] }}">{{ $data['nama'] }}</option>
      @endforeach 
    </select>
    <input type="file" name="foto">
    <input type="text" placeholder="nama" value="{{ $getData['nama'] }}" name="nama">
    <input type="text" placeholder="penerbit" name="penerbit" value="{{ $getData['penerbit'] }}">
    <input type="number" placeholder="jml_buku" name="jml_buku" value="{{ $getData['jml_buku'] }}">
    <textarea name="isi">{{ $getData['isi'] }}</textarea>
    <button type="submit">Kirim</button>
  </form>
@endsection
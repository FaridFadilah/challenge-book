@extends('app')

@section('content')
  <table>
    <thead>
      <tr>
        <th>nama</th>
        <th>email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getBuku as $data)
      <tr>
        <th>{{ $data->nama }}</th>
        <th>{{ $data->foto }}</th>
        <th>{{ $data->penerbit }}</th>
        <th>{{ $data->jml_buku }}</th>
        <th>{{ $data->isi }}</th>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
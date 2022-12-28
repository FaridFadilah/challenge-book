
  <form method="POST" enctype="multipart/form-data" action="{{ route('buku.store') }}">
    @csrf
    <select name="author_id">
      @foreach ($getAuthor as $data)
      <option value="{{ $data['id'] }}">{{ $data['nama'] }}</option>
      @endforeach
    </select>
    <select name="kategori_id">
      @foreach ($getKategori as $data)
      <option value="{{ $data['id'] }}">{{ $data['nama'] }}</option>
      @endforeach
    </select>
    <input type="file" name="foto">
    <input type="text" placeholder="nama" name="nama">
    <input type="text" placeholder="penerbit" name="penerbit">
    <input type="number" placeholder="jml_buku" name="jml_buku">
    <textarea name="isi" placeholder="isi"></textarea>
    <button type="submit">submit</button>
  </form>
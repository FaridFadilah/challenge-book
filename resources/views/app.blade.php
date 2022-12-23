<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
</head>
<body>
  <a href="{{ route('buku.index') }}">Buku</a>
  <a href="{{ route('author.index') }}">Author</a>
  <a href="{{ route('kategori.index') }}">kategori</a>
  @yield('content')
</body>
</html>
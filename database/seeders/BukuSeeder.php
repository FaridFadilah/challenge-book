<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Buku::create([
            'author_id' => 1,
            'kategori_id' => 1,
            'nama' => 'apa ajah',
            'foto' => 'apaaja.jpg',
            'penerbit' => 'erlangga',
            'jml_buku' => 10,
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus debitis ea consequatur ipsam dolor'
        ]);
        Buku::create([
            'author_id' => 1,
            'kategori_id' => 2,
            'nama' => 'aku bangga',
            'foto' => 'akubangga.jpg',
            'penerbit' => 'erlangga',
            'jml_buku' => 4,
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus debitis ea consequatur ipsam dolor sit ammet klores'
        ]);
        Buku::create([
            'author_id' => 2,
            'kategori_id' => 2,
            'nama' => 'aku siapah',
            'foto' => 'akusiapah.jpg',
            'penerbit' => 'murabuana',
            'jml_buku' => 4,
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus debitis ea consequatur ipsam dolor sit ammet klores'
        ]);
        Buku::create([
            'author_id' => 2,
            'kategori_id' => 1,
            'nama' => 'siapa ajah',
            'foto' => 'siapajah.jpg',
            'penerbit' => 'miarabuanamedia',
            'jml_buku' => 4,
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus debitis ea consequatur ipsam dolor sit ammet klores'
        ]);
        Buku::create([
            'author_id' => 2,
            'kategori_id' => 2,
            'nama' => 'kapan ajah',
            'foto' => 'kapanajah.jpg',
            'penerbit' => 'miarabuanamedia',
            'jml_buku' => 4,
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus debitis ea consequatur ipsam dolor sit ammet klores'
        ]);
    }
}
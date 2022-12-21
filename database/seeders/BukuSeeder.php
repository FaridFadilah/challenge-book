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
            'penerbit' => 'erlangga',
            'jml_buku' => 10,
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus debitis ea consequatur ipsam dolor'
        ]);
        Buku::create([
            'author_id' => 1,
            'kategori_id' => 2,
            'nama' => 'aku bangga',
            'penerbit' => 'erlangga',
            'jml_buku' => 4,
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus debitis ea consequatur ipsam dolor sit ammet klores'
        ]);
        Buku::create([
            'author_id' => 2,
            'kategori_id' => 2,
            'nama' => 'aku siapah',
            'penerbit' => 'murabuana',
            'jml_buku' => 4,
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus debitis ea consequatur ipsam dolor sit ammet klores'
        ]);
        Buku::create([
            'author_id' => 2,
            'kategori_id' => 1,
            'nama' => 'siapa ajah',
            'penerbit' => 'miarabuanamedia',
            'jml_buku' => 4,
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus debitis ea consequatur ipsam dolor sit ammet klores'
        ]);
        Buku::create([
            'author_id' => 2,
            'kategori_id' => 2,
            'nama' => 'siapa ajah',
            'penerbit' => 'miarabuanamedia',
            'jml_buku' => 4,
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus debitis ea consequatur ipsam dolor sit ammet klores'
        ]);
    }
}
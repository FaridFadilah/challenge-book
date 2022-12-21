<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        kategori::create([
            'nama' => 'nover',
            'deskripsi' => 'salah satu jenis karya sastra yang berbentuk prosa. Kisah di dalam novel merupakan hasil karya imajinasi yang membahas tentang permasalahan kehidupan seseorang atau berbagai tokoh.'
        ]);
        kategori::create([
            'nama' => 'komik',
            'deskripsi' => 'salah satu jenis karya sastra yang berbentuk prosa. Kisah di dalam novel merupakan hasil karya imajinasi yang membahas tentang permasalahan kehidupan seseorang atau berbagai tokoh.'
        ]);
    }
}

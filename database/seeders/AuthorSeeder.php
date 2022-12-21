<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Author::create([
            'nama' => 'fulan',
            'foto' => 'fulan.jpg',
            'email' => 'fulan@xample.com',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur magnam quibusdam expedita consequuntur tempore ex doloremque officia sequi rerum tempora',
        ]);
        
        Author::create([
            'nama' => 'fulanah',
            'foto' => 'fulanah.jpg',
            'email' => 'fulanah@xample.com',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur magnam quibusdam expedita consequuntur tempore ex doloremque officia sequi rerum tempora',
        ]);
        
        Author::create([
            'nama' => 'fulani',
            'foto' => 'fulani.jpg',
            'email' => 'fulani@xample.com',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur magnam quibusdam expedita consequuntur tempore ex doloremque officia sequi rerum tempora',
        ]);

        Author::create([
            'nama' => 'fulani',
            'foto' => 'fulani.jpg',
            'email' => 'fulani@xample.com',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur magnam quibusdam expedita consequuntur tempore ex doloremque officia sequi rerum tempora',
        ]);

        Author::create([
            'nama' => 'john',
            'foto' => 'john.jpg',
            'email' => 'john@xample.com',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur magnam quibusdam expedita consequuntur tempore ex doloremque officia sequi rerum tempora',
        ]);

    }
}

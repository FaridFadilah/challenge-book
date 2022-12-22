<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id');
            $table->integer('kategori_id');
            $table->string('nama');
            $table->string('foto');
            $table->string('penerbit');
            $table->string('jml_buku');
            $table->text('isi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('bukus');
    }
};

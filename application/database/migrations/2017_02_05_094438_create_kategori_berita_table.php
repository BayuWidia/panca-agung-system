<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_berita', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->string('nama_kategori', 255)->nullable();
            $table->string('keterangan_kategori', 225)->nullable();
            $table->integer('flag_kategori')->nullable();
            $table->integer('flag_utama')->nullable();
            $table->timestamps();
        });

        Schema::table('kategori_berita', function(Blueprint $table){
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('kategori_berita');
    }
}

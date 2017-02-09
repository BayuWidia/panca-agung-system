<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->unsigned()->nullable();
            $table->integer('id_user')->unsigned()->nullable();
            $table->integer('flag_headline')->nullable();
            $table->integer('flag_publish')->nullable();
            $table->integer('view_counter')->nullable();
            $table->longText('judul_berita')->nullable();
            $table->date('tanggal_publish')->nullable();
            $table->string('url_foto', 225)->nullable();
            $table->string('tags', 225)->nullable();
            $table->string('isi_berita')->nullable();
            $table->timestamps();
        });

        Schema::table('berita', function(Blueprint $table){
            $table->foreign('id_kategori')->references('id')->on('kategori_berita');
        });

        Schema::table('berita', function(Blueprint $table){
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
        Schema::table('berita', function (Blueprint $table) {
            //
        });
    }
}

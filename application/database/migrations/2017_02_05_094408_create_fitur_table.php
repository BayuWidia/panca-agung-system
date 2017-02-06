<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->string('nama_fitur', 255)->nullable();
            $table->string('keterangan_fitur', 225)->nullable();
            $table->string('url_fitur', 225)->nullable();
            $table->integer('flag_fitur')->nullable();
            $table->timestamps();
        });

        Schema::table('fitur', function(Blueprint $table){
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
        //
    }
}

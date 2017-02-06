<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->string('nama_client', 255)->nullable();
            $table->string('keterangan_client', 225)->nullable();
            $table->string('url_client', 225)->nullable();
            $table->string('logo_client', 225)->nullable();
            $table->string('tags', 225)->nullable();
            $table->string('link_client', 225)->nullable();
            $table->integer('flag_client')->nullable();
            $table->timestamps();
        });

        Schema::table('client', function(Blueprint $table){
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
        // Schema::drop('client');
    }
}

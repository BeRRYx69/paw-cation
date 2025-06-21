<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntreanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrean', function (Blueprint $table) {
            $table->id('id_antrean');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_jadwal')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_jadwal')->references('id')->on('jadwal');
            $table->string('jenis_hewan');
            $table->string('keluhan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antrean');
    }
}

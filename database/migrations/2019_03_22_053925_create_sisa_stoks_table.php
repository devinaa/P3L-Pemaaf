<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSisaStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisa_stoks', function (Blueprint $table) {
            $table->increments('sisa_id');
            $table->integer('sisa_jumlah');
            $table->integer('sp_id')->unsigned();
            $table->foreign('sp_id')->references('sp_id')->on('spareparts')->onUpdate('cascade')->onDelete('cascade');
            $table->date('sisa_tanggal');
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
        Schema::dropIfExists('sisa_stoks');
    }
}

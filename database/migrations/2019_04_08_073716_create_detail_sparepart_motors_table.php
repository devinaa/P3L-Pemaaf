<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailSparepartMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_sparepart_motors', function (Blueprint $table) {
            $table->increments('dsm_id');
            $table->integer('sp_id')->unsigned();
            $table->foreign('sp_id')->references('sp_id')->on('spareparts')->onUpdate('cascade');
            $table->integer('mtr_id')->unsigned();
            $table->foreign('mtr_id')->references('mtr_id')->on('motors')->onUpdate('cascade');
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
        Schema::dropIfExists('detail_sparepart_motors');
    }
}

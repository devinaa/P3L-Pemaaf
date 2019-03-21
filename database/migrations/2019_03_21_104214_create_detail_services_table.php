<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_services', function (Blueprint $table) {
           $table->increments('ds_id');
           $table->integer('jasa_id');
           $table->foreign('jasa_id')->references('jasa_id')->on('jasas')->onUpdate('cascade');
           $table->integer('tj_id');
           $table->foreign('tj_id')->references('tj_id')->on('transaksi_juals')->onUpdate('cascade');
           $table->integer('ds_jasa');
           $table->foreign('ds_jasa')->references('jasa_id')->on('jasas')->onUpdate('cascade');
           $table->double('ds_jumlah'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_services');
    }
}

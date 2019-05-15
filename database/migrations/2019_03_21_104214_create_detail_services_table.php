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
           $table->integer('jasa_id')->unsigned();
           $table->foreign('jasa_id')->references('jasa_id')->on('jasas')->onUpdate('cascade')->onDelete('cascade');
           $table->string('tj_id',6);
           $table->foreign('tj_id')->references('tj_id')->on('transaksi_juals')->onUpdate('cascade');
           $table->string('ds_jasa');
           $table->double('ds_jumlah'); 
           $table->double('subSV'); 
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
        Schema::dropIfExists('detail_services');
    }
}

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('detail_services', function (Blueprint $table) {
           $table->increments('ds_id');
           $table->integer('jasa_id')->unsigned();
           $table->foreign('jasa_id')->references('jasa_id')->on('jasas')->onUpdate('cascade')->onDelete('cascade');
           $table->string('tj_id',6);
           $table->foreign('tj_id')->references('tj_id')->on('transaksi_juals')->onUpdate('cascade');
           $table->integer('ds_jasa');
           $table->double('ds_jumlah'); 
           $table->timestamps();
        });
         DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        Schema::dropIfExists('detail_services');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

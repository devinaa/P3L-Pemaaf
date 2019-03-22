<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_motors', function (Blueprint $table) {
            $table->increments('dm_id');
            $table->string('tj_id',6);
            $table->foreign('tj_id')->references('tj_id')->on('transaksi_juals')->onUpdate('cascade');
            $table->string('dm_plat',10);
            $table->integer('mtr_id')->unsigned();
            $table->foreign('mtr_id')->references('mtr_id')->on('motors')->onUpdate('cascade');
            $table->string('dm_status',10);
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
        Schema::dropIfExists('detail_motors');
    }
}

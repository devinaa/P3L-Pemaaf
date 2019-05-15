<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_spareparts', function (Blueprint $table) {
            $table->increments('dsp_id');
            $table->integer('sp_id')->unsigned();
            $table->foreign('sp_id')->references('sp_id')->on('spareparts')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tj_id',6);
            $table->foreign('tj_id')->references('tj_id')->on('transaksi_juals')->onUpdate('cascade');
            $table->double('ds_jumlah'); 
            $table->double('subSP'); 
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
        Schema::dropIfExists('detail_spareparts');
    }
}

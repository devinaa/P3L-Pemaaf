<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPengadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengadaans', function (Blueprint $table) {
            $table->increments('dpgd_id');
            $table->string('ta_id',10);
            $table->foreign('ta_id')->references('ta_id')->on('transaksi_pengadaans')->onUpdate('cascade');
            $table->string('sp_id',6);
            $table->foreign('sp_id')->references('sp_id')->on('spareparts')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('dpgd_satuan')->unsigned();
            $table->integer('dpgd_jumlah')->unsigned();
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
        Schema::dropIfExists('detail_pengadaans');
    }
}

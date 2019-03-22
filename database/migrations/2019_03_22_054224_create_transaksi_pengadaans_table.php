<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiPengadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pengadaans', function (Blueprint $table) {
            $table->string('ta_id',10)->primary();
            $table->integer('su_id')->unsigned();
            $table->foreign('su_id')->references('su_id')->on('suppliers')->onUpdate('cascade');
            $table->date('ta_tanggal');
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
        Schema::dropIfExists('transaksi_pengadaans');
    }
}

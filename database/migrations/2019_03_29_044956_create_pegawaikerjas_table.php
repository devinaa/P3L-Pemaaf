<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaikerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawaikerjas', function (Blueprint $table) {
            $table->integer('pgw_id')->unsigned();
            $table->foreign('pgw_id')->references('pgw_id')->on('pegawais')->onUpdate('cascade');
            $table->integer('tb_id')->unsigned();
            $table->foreign('tb_id')->references('tb_id')->on('transaksi_bayars')->onUpdate('cascade');
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
        Schema::dropIfExists('pegawaikerjas');
    }
}

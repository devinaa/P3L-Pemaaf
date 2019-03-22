<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiJualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_juals', function (Blueprint $table) {
            $table->increments('tj_id',6)->primary();
            $table->integer('cab_id')->nullable();
            $table->foreign('cab_id')->references('cab_id')->on('cabangs')->onUpdate('cascade');
            $table->date('tj_tanggal');
            $table->integer('tj_jumlah');
            $table->double('tj_subtotal_spareparts');
            $table->double('tj_subtotal_jasa');
            $table->string('tj_nama',30);
            $table->string('tj_telepon',13);
            $table->integer('id_cs')->unsigned();
            $table->foreign('id_cs')->references('pgw_id')->on('pegawais')->onUpdate('cascade');
            $table->integer('id_montir')->unsigned();
            $table->foreign('id_montir')->references('pgw_id')->on('pegawais')->onUpdate('cascade');
            $table->integer('id_montir2')->unsigned();
            $table->foreign('id_montir2')->references('pgw_id')->on('pegawais')->onUpdate('cascade')->nullable();
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
        Schema::dropIfExists('transaksi_juals');
    }
}

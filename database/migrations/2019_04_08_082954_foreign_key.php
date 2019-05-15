<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('spareparts', function (Blueprint $table) {
            $table->foreign('su_id')->references('su_id')->on('suppliers')->onUpdate('cascade');
            
        });
         Schema::table('transaksi_juals', function (Blueprint $table) {
            $table->foreign('cab_id')->references('cab_id')->on('cabangs')->onUpdate('cascade');
            $table->foreign('id_cs')->references('pgw_id')->on('pegawaikerjas')->onUpdate('cascade');
            $table->foreign('id_montir')->references('pgw_id')->on('pegawaikerjas')->onUpdate('cascade');
            $table->foreign('id_montir2')->references('pgw_id')->on('pegawaikerjas')->onUpdate('cascade')->nullable();
            
        });
         Schema::table('transaksi_bayars', function (Blueprint $table) {
            $table->foreign('cab_id')->references('cab_id')->on('cabangs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pgw_id')->references('pgw_id')->on('pegawais')->onUpdate('cascade');
            $table->foreign('tj_id')->references('tj_id')->on('transaksi_juals')->onUpdate('cascade');
            // $table->foreign('tb_status')->references('tb_status')->on('transaksi_juals')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

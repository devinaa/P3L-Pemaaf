<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiBayarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_bayars', function (Blueprint $table) {
            $table->increments('tb_id');
            $table->integer('cab_id')->unsigned();
            $table->foreign('cab_id')->references('cab_id')->on('cabangs')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('tb_diskon')->unsigned();
            $table->integer('pgw_id')->unsigned();
            $table->foreign('pgw_id')->references('pgw_id')->on('pegawais')->onUpdate('cascade');
            $table->string('tj_id',6);
            $table->foreign('tj_id')->references('tj_id')->on('transaksi_juals')->onUpdate('cascade');
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
        Schema::dropIfExists('transaksi_bayars');
    }
}

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
            $table->integer('tb_diskon')->unsigned();
            $table->integer('pgw_id')->unsigned();
            $table->string('tj_id',6);
            $table->string('tb_status',12);
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

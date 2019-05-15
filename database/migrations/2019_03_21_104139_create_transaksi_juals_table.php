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
            $table->string('tj_id',6)->primary();
            $table->integer('cab_id')->unsigned(); 
            $table->date('tj_tanggal');
            $table->integer('tj_jumlah');
            $table->double('tj_subtotal_spareparts');
            $table->double('tj_subtotal_jasa');
            $table->string('tj_nama',30);
            $table->string('tj_telepon',13);
            $table->integer('id_cs')->unsigned();
            $table->integer('id_montir')->unsigned();
            $table->integer('id_montir2')->unsigned();
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
        Schema::dropIfExists('transaksi_juals');
    }
}

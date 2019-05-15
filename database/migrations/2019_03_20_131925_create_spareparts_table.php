<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->increments('sp_id');
            $table->string('sp_nama',30);
            $table->string('sp_tipe', 20);
            $table->double('sp_hargaBeli');
            $table->double('sp_hargaJual');
            $table->integer('sp_minStok');
            $table->integer('sp_stok');
            $table->string('sp_kodeLetak',11);
            $table->string('sp_merk');
            $table->string('sp_gambar');
            $table->integer('su_id')->unsigned();
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
        Schema::dropIfExists('spareparts');
    }
}

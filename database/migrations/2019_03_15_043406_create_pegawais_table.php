<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->increments('pgw_id');
            $table->string('pgw_nama',30);
            $table->string('pgw_alamat',50);
            $table->double('pgw_gaji');
            $table->string('pgw_telepon',16);
            $table->string('pgw_jabatan',5);
            $table->string('pgw_username',6);
            $table->string('pgw_password');
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
        Schema::dropIfExists('pegawais');
    }
}

<?php


use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabangs', function (Blueprint $table) {
            $table->increments('cab_id');
            $table->string('cab_nama',30);
            $table->string('cab_alamat',50);
            $table->string('cab_telepon',13);
            $table->string('cab_web',30);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('cabangs'); 
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

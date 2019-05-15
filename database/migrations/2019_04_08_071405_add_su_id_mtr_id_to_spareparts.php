<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuIdMtrIdToSpareparts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('spareparts', function (Blueprint $table) {
        //     $table->integer('su_id');
        //     $table->integer('mtr_id');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('spareparts', function (Blueprint $table) {
        //     $table->dropColumn('su_id');
        //     $table->dropColumn('mtr_id');
        // });
    }
}

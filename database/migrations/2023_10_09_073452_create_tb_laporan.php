<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbLaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_laporan', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('absensi_id')->unsigned();
            $table->bigInteger('ukm_id')->unsigned();
            $table->bigInteger('pelatih_id')->collate();
            $table->string('kehadiran')->collate();
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
        Schema::dropIfExists('tb_laporan');
    }
}

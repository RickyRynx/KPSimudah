<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_absensi', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('ukm_id')->unsigned();
            $table->string('user_id')->unique();
            $table->text('keterangan');
            $table->text('foto');
            $table->text('kehadiran_pelatih');
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
        Schema::dropIfExists('tb_absensi');
    }
}

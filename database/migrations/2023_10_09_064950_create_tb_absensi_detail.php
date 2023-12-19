<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAbsensiDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_absensi_detail', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('absensi_id')->unsigned();
            $table->bigInteger('anggota_id')->unsigned();
            $table->enum('menu', ['H', 'I', 'A'])->collate();
            $table->text('keterangan');
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
        Schema::dropIfExists('tb_absensi_detail');
    }
}

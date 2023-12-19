<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAbsensiHarian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_absensi_harian', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('ukm_id')->unsigned();
            $table->string('nama_ukm');
            $table->decimal('rata_rata');
            $table->decimal('jumlah_hadir');
            $table->bigInteger('total_absensi');
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
        Schema::dropIfExists('tb_absensi_harian');
    }
}

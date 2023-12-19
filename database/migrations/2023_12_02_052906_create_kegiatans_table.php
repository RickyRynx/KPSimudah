<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('no_usulan')->collate();
            $table->string('nama_kegiatan')->collate();
            $table->string('afiliasi_lomba')->collate();
            $table->string('file_usulan')->collate();
            $table->string('skala_lomba')->collate();
            $table->string('laporan_lomba')->collate();
            // $table->bigInteger('ukm_id')->unsigned();
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
        Schema::dropIfExists('kegiatans');
    }
}

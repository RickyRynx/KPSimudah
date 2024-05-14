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
            $table->id();
            $table->string('no_usulan')->collate();
            $table->string('nama_kegiatan')->collate();
            $table->string('afiliasi_lomba')->collate();
            $table->text('file_usulan')->collate();
            $table->string('skala_lomba')->collate();
            $table->string('laporan_lomba')->collate();
	        $table->foreignId('ukm_id')->constrained('ukms');
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

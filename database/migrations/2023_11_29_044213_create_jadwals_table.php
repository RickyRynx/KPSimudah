<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->date('tanggal_kegiatan')->collate();
            $table->string('agenda_kegiatan')->collate();
            $table->string('lokasi_kegiatan')->collate();
            $table->string('penanggung_jawab')->collate();
            $table->string('pelatih')->collate();
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
        Schema::dropIfExists('jadwals');
    }
}

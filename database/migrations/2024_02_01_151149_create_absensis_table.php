<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('anggotas');
            $table->foreignId('ukm_id')->constrained('anggotas');
            $table->string('keterangan')->collate();
            $table->string('image')->collate();
            $table->string('kehadiran_pelatih')->collate();
            $table->time('waktu_mulai')->collate();
            $table->time('waktu_selesai')->collate();
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
        Schema::dropIfExists('absensis');
    }
}

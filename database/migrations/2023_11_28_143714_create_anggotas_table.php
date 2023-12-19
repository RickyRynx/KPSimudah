<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('npm')->collate();
            $table->string('nama_mahasiswa')->collate();
            $table->string('nomor_hp')->collate();
            $table->string('email')->collate();
            $table->string('jabatan')->collate();
            // $table->bigInteger('ukm_id')->unsigned();
            $table->string('status')->collate();
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
        Schema::dropIfExists('anggotas');
    }
}

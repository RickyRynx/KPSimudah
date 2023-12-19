<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumumen', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('judul')->collate();
            $table->string('isi_pengumuman')->collate();
            $table->string('upload_by')->collate();
            $table->date('waktu_upload')->collate();
            // $table->string('ukm_id')->collate();
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
        Schema::dropIfExists('pengumumen');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbUkm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ukm', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('nama_ukm')->collate();
            $table->string('pembina_id')->collate();
            $table->string('pelatih_id')->collate();
            $table->string('ketuamahasiswa_id')->collate();
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
        Schema::dropIfExists('tb_ukm');
    }
}

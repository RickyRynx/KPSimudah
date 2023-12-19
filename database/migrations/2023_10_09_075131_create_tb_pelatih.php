<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPelatih extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pelatih', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('username');
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->enum('pilihan', ['admin_aplikasi', 'admin_keuangan', 'ketua_mahasiswa', 'pelatih', 'pembina', 'wakil_rektor_III']);
            $table->string('status_user');
            $table->string('remember_token');
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
        Schema::dropIfExists('tb_pelatih');
    }
}

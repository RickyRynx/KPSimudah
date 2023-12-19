<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbUserSimudah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_user_simudah', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('username')->collate();
            $table->string('nama')->collate();
            $table->string('email')->collate();
            $table->string('password')->collate();
            $table->enum('pilihan', ['admin_aplikasi', 'admin_keuangan', 'ketua_mahasiswa', 'pelatih', 'pembina', 'wakil_rektor_III']);
            $table->string('status_user')->collate();
            $table->string('remember_token')->collate();
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
        Schema::dropIfExists('tb_user_simudah');
    }
}

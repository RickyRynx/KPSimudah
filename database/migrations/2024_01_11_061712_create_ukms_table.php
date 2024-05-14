<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ukm');
            $table->foreignId('pembina_id')->nullable()->constrained('users');
            $table->foreignId('pelatih_id')->nullable()->constrained('users');
            $table->foreignId('ketuaMahasiswa_id')->nullable()->constrained('users');
            $table->enum('status_user', ['Aktif', 'Tidak Aktif'])->default('aktif');
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
        Schema::dropIfExists('ukms');
    }
}

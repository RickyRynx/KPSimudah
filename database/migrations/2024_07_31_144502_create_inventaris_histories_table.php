<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventaris_id');
            $table->string('action'); // 'created' atau 'updated'
            $table->json('old_values')->nullable(); // Data sebelum diupdate
            $table->json('new_values'); // Data setelah diupdate atau data baru
            $table->timestamps();

            // Tambahkan foreign key constraint
            $table->foreign('inventaris_id')->references('id')->on('inventaris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaris_histories');
    }
}

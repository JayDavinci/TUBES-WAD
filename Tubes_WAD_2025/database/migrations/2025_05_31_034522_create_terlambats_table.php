<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('terlambats', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('anggota_id');
    $table->dateTime('waktu_masuk');
    $table->timestamps();

    $table->foreign('anggota_id')
          ->references('anggota_id')
          ->on('anggota_asramas')
          ->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terlambats');
    }
};

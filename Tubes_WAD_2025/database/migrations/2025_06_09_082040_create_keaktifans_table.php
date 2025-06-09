<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    
    Schema::create('keaktifans', function (Blueprint $table) {
    $table->id('keaktifans_id');
    $table->unsignedBigInteger('acara_id');
    $table->unsignedBigInteger('anggota_id');
    $table->dateTime('waktu_hadir');
    $table->timestamps();

    $table->foreign('acara_id')->references('acara_id')->on('acaras')->onDelete('cascade');
    $table->foreign('anggota_id')->references('anggota_id')->on('anggota_asramas')->onDelete('cascade');
});       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keaktifans');
    }
};

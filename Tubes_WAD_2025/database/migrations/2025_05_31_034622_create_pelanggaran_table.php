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
        Schema::create('pelanggaran', function (Blueprint $table) {
            $table->id('pelanggaran_id');
            $table->unsignedBigInteger('anggota_id');
            $table->string('jenis', 255);
            $table->string('foto', 255)->nullable(); // kalau bisa kosong
            $table->dateTime('waktu');
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
        Schema::dropIfExists('pelanggaran');
    }
};

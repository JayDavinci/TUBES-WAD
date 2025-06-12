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
        Schema::create('anggota_asramas', function (Blueprint $table) {
            $table->id('anggota_id');
            $table->string('nama', 100);
            $table->string('nim', 12)->unique();
            $table->string('fakultas', 100);
            $table->string('prodi', 100);
            $table->string('jenis_kelamin', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_asramas');
    }
};

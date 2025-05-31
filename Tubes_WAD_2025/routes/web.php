<?php

use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KeaktifanController;

Route::get('/', function () {
    return view('home');
});

// Pelanggaran
Route::get('/pelanggaran/terlambat', [PelanggaranController::class, 'terlambat'])->name('pelanggaran.terlambat');
Route::get('/pelanggaran/melanggar', [PelanggaranController::class, 'melanggar'])->name('pelanggaran.melanggar');

// Profil
Route::get('/profil/putera', [ProfilController::class, 'putera'])->name('profil.putra');
Route::get('/profil/puteri', [ProfilController::class, 'puteri'])->name('profil.putri');

// Keaktifan Dorm
Route::get('/keaktifan/keaktifan', [KeaktifanController::class, 'index'])->name('keaktifan.keaktifan');

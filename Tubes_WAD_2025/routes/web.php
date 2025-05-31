<?php

use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KeaktifanController;
use App\Http\Controllers\TerlambatController;

Route::get('/', function () {
    return view('home');
});


// Pelanggaran
Route::get('/pelanggaran', [PelanggaranController::class, 'index'])->name('pelanggaran.index');
Route::get('/pelanggaran/create', [PelanggaranController::class, 'create'])->name('pelanggaran.create');
Route::post('/pelanggaran/store', [PelanggaranController::class, 'store'])->name('pelanggaran.store');
Route::delete('/pelanggaran/{id}', [PelanggaranController::class, 'destroy'])->name('pelanggaran.destroy');
Route::get('/pelanggaran/melanggar', [PelanggaranController::class, 'melanggar'])->name('pelanggaran.melanggar');

// Terlambat
Route::get('/terlambat', [TerlambatController::class, 'index'])->name('terlambat.index');
Route::get('/terlambat/create', [TerlambatController::class, 'create'])->name('terlambat.create');
Route::post('/terlambat/store', [TerlambatController::class, 'store'])->name('terlambat.store');
Route::delete('/terlambat/{id}', [TerlambatController::class, 'destroy'])->name('terlambat.destroy');

// Profil
Route::get('/profil/putera', [ProfilController::class, 'putera'])->name('profil.putra');
Route::get('/profil/puteri', [ProfilController::class, 'puteri'])->name('profil.putri');
Route::resource('profil', ProfilController::class);

// Keaktifan Dorm
Route::get('/keaktifan/keaktifan', [KeaktifanController::class, 'index'])->name('keaktifan.keaktifan');

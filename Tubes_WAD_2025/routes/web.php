<?php

use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KeaktifanController;
use App\Http\Controllers\TerlambatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AcaraController;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

//Login And Register
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


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
Route::get('terlambat/{id}/edit', [TerlambatController::class, 'edit'])->name('terlambat.edit');
Route::put('/terlambat/{id}', [TerlambatController::class, 'update'])->name('terlambat.update');
Route::delete('/terlambat/{id}', [TerlambatController::class, 'destroy'])->name('terlambat.destroy');

// Profil
Route::get('/profil/putera', [ProfilController::class, 'putera'])->name('profil.putra');
Route::get('/profil/puteri', [ProfilController::class, 'puteri'])->name('profil.putri');
Route::get('/profil/create', [ProfilController::class, 'create'])->name('profil.create');
Route::post('/profil', [ProfilController::class, 'store'])->name('profil.store');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
Route::get('/profil/{anggota_id}', [ProfilController::class, 'show'])->name('profil.show');
Route::get('/profil/{anggota_id}/edit', [ProfilController::class, 'edit'])->name('profil.edit');
Route::put('/profil/{anggota_id}', [ProfilController::class, 'update'])->name('profil.update');
Route::delete('/profil/{anggota_id}', [ProfilController::class, 'destroy'])->name('profil.destroy');

// Keaktifan Dorm (Acara & Kehadiran)
Route::get('/acara/index', [AcaraController::class, 'index'])->name('acara.index');
Route::get('/acara/create', [AcaraController::class, 'create'])->name('acara.create');
Route::post('/acara/store', [AcaraController::class, 'store'])->name('acara.store'); 
Route::get('/acara/{acara_id}/edit', [AcaraController::class, 'edit'])->name('acara.edit');
Route::put('/acara/{acara_id}', [AcaraController::class, 'update'])->name('acara.update');
Route::delete('/acara/{acara_id}', [AcaraController::class, 'destroy'])->name('acara.destroy');

Route::get('/keaktifan/index', [KeaktifanController::class, 'index'])->name('keaktifan.index');
Route::get('/keaktifan/create', [KeaktifanController::class, 'create'])->name('keaktifan.create');
Route::post('/keaktifan/store', [KeaktifanController::class, 'store'])->name('keaktifan.store'); 
Route::get('/keaktifan/{keaktifan_id}/edit', [KeaktifanController::class, 'edit'])->name('keaktifan.edit');
Route::put('/keaktifan/{keaktifan_id}', [KeaktifanController::class, 'update'])->name('keaktifan.update');
Route::delete('/keaktifan/{keaktifan_id}', [KeaktifanController::class, 'destroy'])->name('keaktifan.destroy');
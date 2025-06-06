<?php

use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KeaktifanController;
use App\Http\Controllers\TerlambatController;
use App\Http\Controllers\AuthController;

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
Route::resource('profil', ProfilController::class);

// Keaktifan Dorm
Route::get('/keaktifan/keaktifan', [KeaktifanController::class, 'index'])->name('keaktifan.keaktifan');

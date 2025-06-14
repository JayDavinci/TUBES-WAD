<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\KeaktifanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TerlambatController;
use App\Http\Controllers\PelanggaranController;

Route::get('/acara', [AcaraController::class, 'getListAcara']); #api untuk list Acara
Route::get('/keaktifan', [KeaktifanController::class, 'getListKeaktifan']); #api untuk list Keaktifan atau Kehadiran
Route::get('/profil', [ProfilController::class, 'getListProfil']); #api untuk list Profil
Route::get('/terlambat', [TerlambatController::class, 'getListTerlambat']); #api untuk list Terlambat
Route::get('/pelanggaran', [PelanggaranController::class, 'getListPelanggaran']); #api untuk list Pelanggaran
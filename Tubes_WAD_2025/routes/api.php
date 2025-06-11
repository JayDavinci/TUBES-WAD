<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\KeaktifanController;
use App\Http\Controllers\PelanggaranController;

Route::get('/acara', [AcaraController::class, 'getListAcara']);
Route::get('/keaktifan', [KeaktifanController::class, 'getListKeaktifan']);
Route::get('/pelanggaran', [PelanggaranController::class, 'getListPelanggaran']);
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\KeaktifanController;

Route::get('/acara', [AcaraController::class, 'getListAcara']);
Route::get('/keaktifan', [KeaktifanController::class, 'getListKeaktifan']);
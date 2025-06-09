<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcaraController;

Route::get('/acara', [AcaraController::class, 'getListAcara']);
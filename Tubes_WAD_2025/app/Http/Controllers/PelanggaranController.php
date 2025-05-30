<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function terlambat() {
    return view('pelanggaran.terlambat');
}

public function melanggar() {
    return view('pelanggaran.melanggar');
}

}

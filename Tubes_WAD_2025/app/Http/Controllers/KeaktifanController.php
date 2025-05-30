<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeaktifanController extends Controller
{
    public function index() {
    return view('keaktifan.keaktifan');
}
}

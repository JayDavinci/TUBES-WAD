<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function putera() {
    return view('profil.putra');
}

public function puteri() {
    return view('profil.putri');
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;

class AcaraController extends Controller
{
     public function index()
    {
        $data =  Acara::get();
        return view('acara.acara', compact('data'));
    }

    // Tampilkan form tambah profil
    public function create(){
        return view('acara.create');
    }
    
    // Simpan profil baru
        public function store(Request $request){
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'tanggal_acara' => 'required|date',
        ]);

        $data = $request->only(['nama_acara', 'penyelenggara','tanggal_acara']);

        Acara::create($data);
        return redirect()->route('acara.index')->with('success', 'Acara berhasil ditambahkan!');
    }
    
    // Tampilkan form edit profil
        public function edit($acara_id)
    {
        $data = Acara::findOrFail($acara_id);
        return view('acara.edit', compact('data'));
    }

    // Update profil
        public function update(Request $request, $acara_id)
    {
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'tanggal_acara' => 'required|date',
        ]);

        $acara = Acara::findOrFail($acara_id);
        $data = $request->only(['nama_acara', 'penyelenggara','tanggal_acara']);

        $acara->update($data);
        return redirect()->route('acara.index')->with('success', 'Acara berhasil diupdate!');
    }
    
    // Hapus profil
        public function destroy($acara_id)
    {
        $acara = Acara::findOrFail($acara_id);
        $acara->delete();
        return redirect()->route('acara.index')->with('success', 'Acara berhasil dihapus!');
    }
}

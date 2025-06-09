<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;

class KeaktifanController extends Controller
{
     public function index(Request $request)
    {
        $query = Acara::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                ->orWhere('nim', 'like', "%$search%")
                ->orWhere('fakultas', 'like', "%$search%")
                ->orWhere('prodi', 'like', "%$search%")
                ->orWhere('jenis_kelamin', 'like', "%$search%");
            });
        }

        $data = $query->get();
        return view('keaktifan.keaktifan', compact('data'));
    }

    // Tampilkan form tambah profil
    public function create(){
        return view('keaktifan.create');
    }
    
    // Simpan profil baru
        public function store(Request $request){
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255'
        ]);

        $data = $request->only(['nama_acara', 'penyelenggara']);

        Acara::create($data);
        return redirect()->route('keaktifan.keaktifan')->with('success', 'Acara berhasil ditambahkan!');
    }
    
    // Tampilkan form edit profil
        public function edit($acara_id)
    {
        $data = Acara::findOrFail($acara_id);
        return view('keaktifan.edit', compact('data'));
    }

    // Update profil
        public function update(Request $request, $acara_id)
    {
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255'
        ]);

        $acara = Acara::findOrFail($acara_id);
        $data = $request->only(['nama_acara', 'penyelenggara']);

        $acara->update($data);
        return redirect()->route('keaktifan.keaktifan')->with('success', 'Acara berhasil diupdate!');
    }
    
    // Hapus profil
        public function destroy($acara_id)
    {
        $acara = Acara::findOrFail($acara_id);
        $acara->delete();
        return redirect()->route('keaktifan.keaktifan')->with('success', 'Acara berhasil dihapus!');
    }

}

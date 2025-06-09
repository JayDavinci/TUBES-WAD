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

    public function create(){
        return view('keaktifan.create');
    }
    
        public function store(Request $request){
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255'
        ]);

        $data = $request->only(['nama_acara', 'penyelenggara']);

        Acara::create($data);
        return redirect()->route('keaktifan.keaktifan')->with('success', 'Acara berhasil ditambahkan!');
    }
    
        public function edit($acara_id)
    {
        $data = Acara::findOrFail($acara_id);
        return view('keaktifan.edit', compact('data'));
    }

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
    
        public function destroy($acara_id)
    {
        $acara = Acara::findOrFail($acara_id);
        $acara->delete();
        return redirect()->route('keaktifan.keaktifan')->with('success', 'Acara berhasil dihapus!');
    }

}

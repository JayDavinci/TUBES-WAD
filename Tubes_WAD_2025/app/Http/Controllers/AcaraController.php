<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use App\Http\Resources\AcaraResource;

class AcaraController extends Controller
{
     public function index()
    {
        $data =  Acara::get();
        return view('acara.acara', compact('data'));
    }

    public function create(){
        return view('acara.create');
    }
    
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
    
        public function edit($acara_id)
    {
        $data = Acara::findOrFail($acara_id);
        return view('acara.edit', compact('data'));
    }

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
    
        public function destroy($acara_id)
    {
        $acara = Acara::findOrFail($acara_id);
        $acara->delete();
        return redirect()->route('acara.index')->with('success', 'Acara berhasil dihapus!');
    }
    
     public function getListAcara()
    {
        $acara = Acara::all();
        return new AcaraResource(true, 'List Acara', $acara);
    }
}

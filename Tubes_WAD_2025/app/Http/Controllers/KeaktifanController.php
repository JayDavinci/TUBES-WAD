<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\Keaktifan;
use App\Models\AnggotaAsrama;

class KeaktifanController extends Controller
{
     public function index(Request $request)
    {
        $data = Keaktifan::with('anggota','acara')->get();
        return view('keaktifan.kehadiran', compact('data'));
    }

    public function create(){
         $anggota = AnggotaAsrama::all();
         $acara = Acara::all();
        return view('keaktifan.create',compact('anggota','acara'));
    }
    
    public function store(Request $request){
        $request->validate([
            'acara_id' => 'required',
            'anggota_id' => 'required',
            'waktu_hadir' => 'required|date',
        ]);

        $data = $request->only(['acara_id', 'anggota_id','waktu_hadir']);

        Keaktifan::create($data);
        return redirect()->route('keaktifan.index')->with('success', 'Kehadiran berhasil ditambahkan!');
    }
    
        public function edit($keaktifan_id)
    {
        $keaktifan = Keaktifan::findOrFail($keaktifan_id);
         $anggota = AnggotaAsrama::all();
         $acara = Acara::all();
        return view('keaktifan.edit', compact('keaktifan','anggota','acara'));
    }

        public function update(Request $request, $keaktifan_id)
    {
        $request->validate([
            'acara_id' => 'required',
            'anggota_id' => 'required',
            'waktu_hadir' => 'required|date',
        ]);

        $keaktifan = Keaktifan::findOrFail($keaktifan_id);
        $data = $request->only(['acara_id', 'anggota_id','waktu_hadir']);

        $keaktifan->update($data);
        return redirect()->route('keaktifan.index')->with('success', 'Kehadiran berhasil diupdate!');
    }
    
        public function destroy($keaktifan_id)
    {
        $keaktifan = Keaktifan::findOrFail($keaktifan_id);
        $keaktifan->delete();
        return redirect()->route('keaktifan.index')->with('success', 'Kehadiran berhasil dihapus!');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terlambat;
use App\Models\AnggotaAsrama;

class TerlambatController extends Controller
{
    public function index()
    {
        $terlambats = Terlambat::with('anggotaAsrama')->latest()->get();
        return view('Pelanggaran.terlambat', compact('terlambats'));
    }

    public function create()
    {
        $anggota = AnggotaAsrama::all();
        return view('Pelanggaran.create_terlambat', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggota_asrama,anggota_id',
            'waktu_masuk' => 'required|date',
        ]);

        Terlambat::create($request->only(['anggota_id', 'waktu_masuk']));
        return redirect()->route('terlambat.index')->with('success', 'Data keterlambatan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $terlambat = Terlambat::findOrFail($id);
        $terlambat->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}

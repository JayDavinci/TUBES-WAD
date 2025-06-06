<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terlambat;
use App\Models\AnggotaAsrama;

class TerlambatController extends Controller
{
    public function index()
    {
        $terlambats = Terlambat::with('anggota')->latest()->get();
        return view('Pelanggaran.terlambat', compact('terlambats'));
    }

    public function create()
    {
        $anggota = AnggotaAsrama::select('anggota_id', 'nama', 'jenis_kelamin')->get();
        return view('Pelanggaran.create_terlambat', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggota_asramas,anggota_id',
            'waktu_masuk' => 'required|date',
        ]);

        Terlambat::create($request->only(['anggota_id', 'waktu_masuk']));
        return redirect()->route('terlambat.index')->with('success', 'Data keterlambatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $terlambat = Terlambat::findOrFail($id);
        $anggota = AnggotaAsrama::all();
        return view('Pelanggaran.edit_terlambat', compact('terlambat', 'anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggota_asramas,anggota_id',
            'waktu_masuk' => 'required|date',
        ]);

        $terlambat = Terlambat::findOrFail($id);
        $terlambat->update($request->only(['anggota_id', 'waktu_masuk']));

        return redirect()->route('terlambat.index')->with('success', 'Data keterlambatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $terlambat = Terlambat::findOrFail($id);
        $terlambat->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}

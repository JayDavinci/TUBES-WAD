<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\AnggotaAsrama;

class PelanggaranController extends Controller
{
    public function terlambat() {
    return view('pelanggaran.terlambat');
}

public function melanggar() {
    return view('pelanggaran.melanggar');
}

public function index()
    {
        $pelanggarans = Pelanggaran::with('anggota')->latest()->get();
        return view('Pelanggaran.melanggar', compact('pelanggarans'));
    }

    public function create()
    {
        $anggota = AnggotaAsrama::all();
        return view('Pelanggaran.create_pelanggaran', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggota_asrama,anggota_id',
            'jenis' => 'required|string',
            'foto' => 'nullable|image|max:2048',
            'waktu' => 'required|date',
        ]);

        $data = $request->only(['anggota_id', 'jenis', 'waktu']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_pelanggaran', 'public');
        }

        Pelanggaran::create($data);
        return redirect()->route('pelanggaran.index')->with('success', 'Data pelanggaran berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        $pelanggaran->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

}

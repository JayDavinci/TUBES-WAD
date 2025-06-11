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
    return $this->index();
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

    //function tambah
    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggota_asramas,anggota_id',
            'jenis' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
            'waktu' => 'required|date',
        ]);

        $data = $request->only(['anggota_id', 'jenis','deskripsi', 'waktu']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_pelanggaran', 'public');
        }

        Pelanggaran::create($data);
        return redirect()->route('pelanggaran.index')->with('success', 'Data pelanggaran berhasil ditambahkan.');
    }

    //function edit
    public function edit($id)
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        $anggota = AnggotaAsrama::all();
        return view('Pelanggaran.edit_pelanggaran', compact('pelanggaran', 'anggota'));
    }

    //function update
    public function update(Request $request, $id)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggota_asramas,anggota_id',
            'jenis' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
            'waktu' => 'required|date',
        ]);

        $pelanggaran = Pelanggaran::findOrFail($id);
        $data = $request->only(['anggota_id', 'jenis','deskripsi', 'waktu']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_pelanggaran', 'public');
        }

        $pelanggaran->update($data);
        return redirect()->route('pelanggaran.index')->with('success', 'Data pelanggaran berhasil diperbarui.');
    }

    //function delete
    public function destroy($id)
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        $pelanggaran->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
    public function getListPelanggaran()
    {
        $pelanggaran = Pelanggaran::all();
        return new PelanggaranResource(true, 'List Pelanggaran', $pelanggaran);
    }
}

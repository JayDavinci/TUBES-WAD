<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\AnggotaAsrama;
use App\Http\Resources\PelanggaranResource;

class PelanggaranController extends Controller
{
    public function terlambat() {
    return view('pelanggaran.terlambat');
    }

    public function melanggar(Request $request)
    {
        $query = Pelanggaran::query();

        // Filter by Jenis (kalau ada)
        if ($request->filled('filter_jenis')) {
            $query->where('jenis', $request->filter_jenis);
        }

        // Filter by Nama (kalau ada)
        if ($request->filled('search')) {
            $query->whereHas('anggota', function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by Rentang Tanggal (kalau ada)
        if ($request->filled('start_date')) {
            $query->whereDate('waktu', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('waktu', '<=', $request->end_date);
        }

        // Eksekusi query-nya
        $pelanggarans = $query->with('anggota')->orderBy('waktu', 'desc')->get();

        return view('pelanggaran.melanggar', compact('pelanggarans'));
    }

    public function index(Request $request)
    {
        $query = Pelanggaran::with('anggota');

        if ($request->filled('filter_jenis')) {
            $query->where('jenis', $request->filter_jenis);
        }

        $pelanggarans = $query->get();

        return view('pelanggaran.melanggar', compact('pelanggarans'));
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

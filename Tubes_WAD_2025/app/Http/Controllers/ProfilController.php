<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    // Tampilkan semua profil
    public function index()
    {
        $profils = Profil::all();
        return view('profil.index', compact('profils'));
    }

    // Tampilkan form tambah profil
    public function create()
    {
        return view('profil.create');
    }

    // Simpan profil baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'fakultas' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        Profil::create($request->all());
        return redirect()->route('profil.index')->with('success', 'Profil berhasil ditambahkan!');
    }

    // Tampilkan detail profil
    public function show($anggota_id)
    {
        $profil = Profil::findOrFail($anggota_id);
        return view('profil.show', compact('profil'));
    }

    // Tampilkan form edit profil
    public function edit($anggota_id)
    {
        $profil = Profil::findOrFail($anggota_id);
        return view('profil.edit', compact('profil'));
    }

    // Update profil
    public function update(Request $request, $anggota_id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'fakultas' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan'
        ]);

        $profil = Profil::findOrFail($anggota_id);
        $profil->update($request->all());
        return redirect()->route('profil.index')->with('success', 'Profil berhasil diupdate!');
    }

    // Hapus profil
    public function destroy($anggota_id)
    {
        $profil = Profil::findOrFail($anggota_id);
        $profil->delete();
        return redirect()->route('profil.index')->with('success', 'Profil berhasil dihapus!');
    }

    // Tampilkan profil putra
    public function putera()
    {
        $profils = Profil::where('jenis_kelamin', 'Laki-laki')->get();
        return view('profil.putra', compact('profils'));
    }

    // Tampilkan profil putri
    public function puteri()
    {
        $profils = Profil::where('jenis_kelamin', 'Perempuan')->get();
        return view('profil.putri', compact('profils'));
    }
}
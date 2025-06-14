<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Http\Resources\ProfilResource;

class ProfilController extends Controller
{
        public function index(Request $request)
    {
        $query = Profil::query();

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

        if ($request->filled('jenis_kelamin') && $request->jenis_kelamin !== 'Semua') {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        $profils = $query->get();

        return view('profil.index', compact('profils'));
    }

        public function create()
    {
        return view('profil.create');
    }

        public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:12|unique:anggota_asramas,nim',
            'fakultas' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['nama', 'nim', 'fakultas', 'prodi', 'jenis_kelamin']);

        $data['jenis_kelamin'] = ucfirst(strtolower($data['jenis_kelamin']));

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_profil', 'public');
        }

        Profil::create($data);
        return redirect()->route('profil.index')->with('success', 'Profil berhasil ditambahkan!');
    }

        public function show($anggota_id)
    {
        $profil = Profil::findOrFail($anggota_id);
        return view('profil.show', compact('profil'));
    }

        public function edit($anggota_id)
    {
        $profil = Profil::findOrFail($anggota_id);
        return view('profil.edit', compact('profil'));
    }

        public function update(Request $request, $anggota_id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:12|unique:anggota_asramas,nim,' . $anggota_id . ',anggota_id',
            'fakultas' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $profil = Profil::findOrFail($anggota_id);
        $data = $request->only(['nama', 'nim', 'fakultas', 'prodi', 'jenis_kelamin']);

        $data['jenis_kelamin'] = ucfirst(strtolower($data['jenis_kelamin']));

        if ($request->hasFile('foto')) {
            if ($profil->foto && \Storage::disk('public')->exists($profil->foto)) {
                \Storage::disk('public')->delete($profil->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_profil', 'public');
        }

        $profil->update($data);
        return redirect()->route('profil.index')->with('success', 'Profil berhasil diupdate!');
    }

        public function destroy($anggota_id)
    {
        $profil = Profil::findOrFail($anggota_id);
        if ($profil->foto && \Storage::disk('public')->exists($profil->foto)) {
                \Storage::disk('public')->delete($profil->foto);
        }
        $profil->delete();
        return redirect()->route('profil.index')->with('success', 'Profil berhasil dihapus!');
    }

        public function putera(Request $request)
    {
        $query = Profil::where('jenis_kelamin', 'Laki-laki')->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                ->orWhere('nim', 'like', "%$search%")
                ->orWhere('fakultas', 'like', "%$search%")
                ->orWhere('prodi', 'like', "%$search%");
            });
        }

        $profils = $query->paginate(10);
        return view('profil.putra', compact('profils'));
    }

        public function puteri(Request $request)
    {
        $query = Profil::where('jenis_kelamin', 'Perempuan')->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                ->orWhere('nim', 'like', "%$search%")
                ->orWhere('fakultas', 'like', "%$search%")
                ->orWhere('prodi', 'like', "%$search%");
            });
        }

        $profils = $query->paginate(10);
        return view('profil.putri', compact('profils'));
    }
    public function getListProfil()
    {
        $profils = Profil::all();
        return new ProfilResource(true, 'List Profil', $profils);
    }
}
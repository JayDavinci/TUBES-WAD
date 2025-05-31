@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-danger mb-4">Gedung Putri</h1>
    <p>Halaman Gedung Putri.</p>
    <a href="{{ route('profil.create') }}" class="btn btn-primary mb-3">Tambah Profil Putri</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Fakultas</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($profils as $profil)
            <tr>
                <td>{{ $profil->nama }}</td>
                <td>{{ $profil->nim }}</td>
                <td>{{ $profil->fakultas }}</td>
                <td>{{ $profil->prodi }}</td>
                <td>
                    <a href="{{ route('profil.show', $profil->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('profil.edit', $profil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('profil.destroy', $profil->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data profil putri.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
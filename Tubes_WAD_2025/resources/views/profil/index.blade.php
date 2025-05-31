@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Profil</h2>
    <a href="{{ route('profil.create') }}" class="btn btn-success mb-3">Tambah Profil</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Fakultas</th>
                <th>Prodi</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($profils as $profil)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $profil->nama }}</td>
                <td>{{ $profil->nim }}</td>
                <td>{{ $profil->fakultas }}</td>
                <td>{{ $profil->prodi }}</td>
                <td>{{ ucfirst($profil->jenis_kelamin) }}</td>
                <td>
                    <a href="{{ route('profil.show', $profil->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('profil.edit', $profil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('profil.destroy', $profil->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data profil.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
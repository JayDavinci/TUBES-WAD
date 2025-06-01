@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profil</h2>
    <form action="{{ route('profil.update', $profil->anggota_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $profil->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ $profil->nim }}" required>
        </div>
        <div class="mb-3">
            <label for="fakultas" class="form-label">Fakultas</label>
            <input type="text" name="fakultas" class="form-control" value="{{ $profil->fakultas }}" required>
        </div>
        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
            <input type="text" name="prodi" class="form-control" value="{{ $profil->prodi }}" required>
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="putra" {{ $profil->jenis_kelamin == 'putra' ? 'selected' : '' }}>Putra</option>
                <option value="putri" {{ $profil->jenis_kelamin == 'putri' ? 'selected' : '' }}>Putri</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('profil.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
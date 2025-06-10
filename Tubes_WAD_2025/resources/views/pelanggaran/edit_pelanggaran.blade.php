@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Pelanggaran</h2>
    <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="anggota_id" class="form-label">Nama</label>
            <select class="form-control" name="anggota_id" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggota as $a)
                    <option value="{{ $a->id }}" {{ $pelanggaran->anggota_id == $a->id ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select name="jenis" class="form-control" required>
                <option value="terlambat" {{ $pelanggaran->jenis == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                <option value="melanggar" {{ $pelanggaran->jenis == 'melanggar' ? 'selected' : '' }}>Melanggar</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu</label>
            <input type="datetime-local" name="waktu" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($pelanggaran->waktu)) }}" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
            @if($pelanggaran->foto)
                <img src="{{ asset('storage/' . $pelanggaran->foto) }}" width="150" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route($pelanggaran->jenis == 'terlambat' ? 'terlambat.index' : 'melanggar.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-danger">Tambah Kehadiran</h1>

    <form action="{{ route('keaktifan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="acara_id" class="form-label">Acara</label>
            <select id="acara_id" name="acara_id" class="form-select" required>
                <option value="">-- Pilih Acara --</option>
                 @foreach ($acara as $item)
                    <option value="{{ $item->acara_id }}">
                        {{ $item->nama_acara }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="anggota_id" class="form-label">Nama</label>
            <select name="anggota_id" id="anggota_id" class="form-select" required>
                <option value="">-- Pilih Nama Anggota --</option>
                @foreach ($anggota as $a)
                    <option value="{{ $a->anggota_id }}">
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="waktu_hadir" class="form-label">Waktu Hadir</label>
            <input type="datetime-local" name="waktu_hadir" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-danger">Simpan</button>
        <a href="{{ route('keaktifan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

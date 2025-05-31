@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-danger">Tambah Keterlambatan</h1>

    <form action="{{ route('terlambat.store') }}" method="POST">
        @csrf

        <!-- Nama (anggota_id) -->
        <div class="mb-3">
            <label for="anggota_id" class="form-label">Nama</label>
            <select name="anggota_id" class="form-select" required>
                <option value="">-- Pilih Nama Anggota --</option>
                {{-- Looping anggota nanti diisi controller --}}
                @foreach ($anggota as $a)
                    <option value="{{ $a->anggota_id }}">{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Waktu Masuk -->
        <div class="mb-3">
            <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
            <input type="datetime-local" name="waktu_masuk" class="form-control" required>
        </div>

        <!-- Tombol Submit dan Batal -->
        <button type="submit" class="btn btn-danger">Simpan</button>
        <a href="{{ route('terlambat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

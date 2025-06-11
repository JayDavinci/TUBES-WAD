@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-danger">Tambah Pelanggaran</h1>

    <form action="{{ route('pelanggaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nama (anggota_id) -->
        <div class="mb-3">
            <label for="anggota_id" class="form-label">Nama</label>
            <select name="anggota_id" class="form-select" required>
                <option value="">-- Pilih Nama Anggota --</option>
                {{-- Looping anggota_asrama nanti diisi controller --}}
                @foreach ($anggota as $a)
                    <option value="{{ $a->anggota_id }}">{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Jenis -->
        <div class="mb-3">
            <label for="jenis" class="form-label">
                Jenis Pelanggaran 
                <span data-bs-toggle="tooltip" data-bs-placement="right" title="Pilih kategori jenis pelanggaran yang sesuai dengan peraturan asrama.">
                    <i class="bi bi-question-circle-fill text-primary"></i>
                </span>
            </label>
            <select name="jenis" class="form-control" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="Pelanggaran Etika Berpakaian">Pelanggaran Etika Berpakaian</option>
                <option value="Kepemilikan Barang Terlarang">Kepemilikan Barang Terlarang</option>
                <option value="Perilaku Tidak Pantas">Perilaku Tidak Pantas</option>
                <option value="Pelanggaran Keamanan">Pelanggaran Keamanan</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        
        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Pelanggaran</label>
            <input type="text" name="deskripsi" class="form-control" placeholder="Contoh: Tidak memakai jas almamater" required>
        </div>

        <!-- Foto -->
        <div class="mb-3">
            <label for="foto" class="form-label">Upload Foto Bukti</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <!-- Waktu -->
        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu Pelanggaran</label>
            <input type="datetime-local" name="waktu" class="form-control" required>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-danger">Simpan</button>
        <a href="{{ route('pelanggaran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

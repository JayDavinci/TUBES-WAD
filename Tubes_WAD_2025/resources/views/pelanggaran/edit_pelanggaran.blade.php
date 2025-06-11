@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Pelanggaran</h2>
    <form action="{{ route('pelanggaran.update', $pelanggaran->pelanggaran_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="anggota_id" class="form-label">Nama</label>
            <select class="form-control" name="anggota_id" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggota as $a)
                    <!-- <option value="{{ $a->id }}" {{ $pelanggaran->anggota_id == $a->id ? 'selected' : '' }}> -->
                    <option value="{{ $a->anggota_id }}" {{ $pelanggaran->anggota_id == $a->anggota_id ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">
                Jenis Pelanggaran 
                <span data-bs-toggle="tooltip" data-bs-placement="right" title="Pilih kategori jenis pelanggaran yang sesuai dengan peraturan asrama.">
                    <i class="bi bi-question-circle-fill text-primary"></i>
                </span>
            </label>
            <select name="jenis" class="form-control" required>
                <option value="Pelanggaran Etika Berpakaian" {{ $pelanggaran->jenis == 'Pelanggaran Etika Berpakaian' ? 'selected' : '' }}>Pelanggaran Etika Berpakaian</option>
                <option value="Kepemilikan Barang Terlarang" {{ $pelanggaran->jenis == 'Kepemilikan Barang Terlarang' ? 'selected' : '' }}>Kepemilikan Barang Terlarang</option>
                <option value="Perilaku Tidak Pantas" {{ $pelanggaran->jenis == 'Perilaku Tidak Pantas' ? 'selected' : '' }}>Perilaku Tidak Pantas</option>
                <option value="Pelanggaran Keamanan" {{ $pelanggaran->jenis == 'Pelanggaran Keamanan' ? 'selected' : '' }}>Pelanggaran Keamanan</option>
                <option value="Lainnya" {{ $pelanggaran->jenis == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required>{{ $pelanggaran->deskripsi }}</textarea>
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
        <a href="{{ route($pelanggaran->jenis == 'terlambat' ? 'terlambat.index' : 'pelanggaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

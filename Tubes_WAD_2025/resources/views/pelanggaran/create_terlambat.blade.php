@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-danger">Tambah Keterlambatan</h1>

    <form action="{{ route('terlambat.store') }}" method="POST">
        @csrf

        <!-- Gedung -->
        <div class="mb-3">
            <label for="gedung" class="form-label">Gedung</label>
            <select id="gedung" name="gedung" class="form-select" required>
                <option value="">-- Pilih Gedung --</option>
                <option value="Putera">Gedung Putera</option>
                <option value="Puteri">Gedung Puteri</option>
            </select>
        </div>

        <!-- Nama (anggota_id) -->
        <div class="mb-3">
    <label for="anggota_id" class="form-label">Nama</label>
    <select name="anggota_id" id="anggota_id" class="form-select" required>
        <option value="">-- Pilih Nama Anggota --</option>
        @foreach ($anggota as $a)
            <option value="{{ $a->anggota_id }}" data-gedung="{{ $a->jenis_kelamin == 'Laki-laki' ? 'Putera' : 'Puteri' }}">
                {{ $a->nama }}
            </option>
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

<!-- Opsi untuk Gedung -->
@push('scripts')
<script>
    document.getElementById('gedung').addEventListener('change', function () {
        var selectedGedung = this.value;
        var anggotaSelect = document.getElementById('anggota_id');
        var options = anggotaSelect.options;

        for (var i = 0; i < options.length; i++) {
            var option = options[i];
            var gedung = option.getAttribute('data-gedung');

            if (!selectedGedung || option.value === "") {
                option.style.display = "";
            } else if (gedung === selectedGedung) {
                option.style.display = "";
            } else {
                option.style.display = "none";
            }
        }

        anggotaSelect.value = "";
    });
</script>
@endpush

@endsection

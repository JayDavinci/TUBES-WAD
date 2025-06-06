@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Keterlambatan</h2>

    <form action="{{ route('terlambat.update', $terlambat->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
        <label for="gedung" class="form-label">Gedung</label>
        <select id="gedung" class="form-select" required>
            <option value="">-- Pilih Gedung --</option>
            <option value="Putera" {{ optional($terlambat->anggota)->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Gedung Putera</option>
            <option value="Puteri" {{ optional($terlambat->anggota)->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Gedung Puteri</option>
        </select>
    </div>

        <div class="mb-3">
            <label for="anggota_id" class="form-label">Nama</label>
            <select class="form-control" name="anggota_id" id="anggota_id" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggota as $a)
                    <option value="{{ $a->anggota_id }}" data-gedung="{{ $a->jenis_kelamin == 'Laki-laki' ? 'Putera' : 'Puteri' }}"
                        {{ $terlambat->anggota_id == $a->anggota_id ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
            <input type="datetime-local" name="waktu_masuk" class="form-control"
                value="{{ \Carbon\Carbon::parse($terlambat->waktu_masuk)->format('Y-m-d\TH:i') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('terlambat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const gedungSelect = document.getElementById('gedung');
        const anggotaSelect = document.getElementById('anggota_id');

        function filterAnggota() {
            const selectedGedung = gedungSelect.value;
            const options = anggotaSelect.options;

            for (let i = 0; i < options.length; i++) {
                const option = options[i];
                const gedung = option.getAttribute('data-gedung');

                if (!selectedGedung || option.value === "") {
                    option.style.display = "";
                } else if (gedung === selectedGedung) {
                    option.style.display = "";
                } else {
                    option.style.display = "none";
                }
            }
        }

        gedungSelect.addEventListener('change', function () {
            anggotaSelect.value = "";
            filterAnggota();
        });

        // Panggil saat load awal untuk menyesuaikan tampilan
        filterAnggota();
    });
</script>
@endpush

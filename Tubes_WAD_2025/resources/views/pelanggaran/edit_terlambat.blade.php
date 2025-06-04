@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Keterlambatan</h2>

    <form action="{{ route('terlambat.update', $terlambat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="anggota_id" class="form-label">Nama</label>
            <select class="form-control" name="anggota_id" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggota as $a)
                    <option value="{{ $a->anggota_id }}" {{ $terlambat->anggota_id == $a->anggota_id ? 'selected' : '' }}>
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

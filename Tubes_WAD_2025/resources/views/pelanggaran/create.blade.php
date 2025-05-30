@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-danger mb-4">Tambah Pelanggaran</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelanggaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Anggota</label>
            <select name="anggota_id" class="form-control" required>
                <option value="">Pilih Anggota</option>
                @foreach($anggota as $a)
                    <option value="{{ $a->id }}">{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jenis Pelanggaran</label>
            <input type="text" name="jenis" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="mb-3">
            <label>Waktu</label>
            <input type="datetime-local" name="waktu" class="form-control" required>
        </div>
        <button class="btn btn-danger">Simpan</button>
        <a href="{{ route('pelanggaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

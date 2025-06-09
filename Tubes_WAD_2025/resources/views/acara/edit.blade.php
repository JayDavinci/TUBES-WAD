@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Acara</h2>
    <form action="{{ route('acara.update', $data->acara_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_acara" class="form-label">Nama Acara</label>
            <input type="text" name="nama_acara" class="form-control" value="{{ $data->nama_acara }}" required>
        </div>
        <div class="mb-3">
            <label for="penyelenggara" class="form-label">Nama Penyelenggara</label>
            <input type="text" name="penyelenggara" class="form-control" value="{{ $data->penyelenggara }}" required>
        </div>
        
        <div class="mb-3">
            <label for="tanggal_acara" class="form-label">Tanggal Acara</label>
            <input type="datetime-local" name="tanggal_acara" class="form-control"
                value="{{ \Carbon\Carbon::parse($data->tanggal_acara)->format('Y-m-d\TH:i') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
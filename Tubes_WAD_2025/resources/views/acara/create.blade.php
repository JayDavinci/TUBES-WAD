@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Acara</h2>
    <form action="{{ route('acara.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_acara" class="form-label">Nama Acara</label>
            <input type="text" name="nama_acara" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="penyelenggara" class="form-label">Nama Penyelenggara</label>
            <input type="text" name="penyelenggara" class="form-control" required>
        </div>
          <div class="mb-3">
            <label for="tanggal_acara" class="form-label">Tanggal Acara</label>
            <input type="datetime-local" name="tanggal_acara" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">⏰ Data Terlambat</h1>

    <a href="{{ route('terlambat.create') }}" class="btn btn-primary mb-3">
        + Tambah Data Terlambat
    </a>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Pencarian Nama --}}
   <form method="GET" action="{{ route('terlambat.index') }}" class="row g-2 align-items-center mb-3">
    <div class="col-md-6">
        <input type="text" name="nama" class="form-control" placeholder="Cari berdasarkan nama" value="{{ request('nama') }}">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-outline-primary">🔍 Cari</button>
    </div>
    <div class="col-auto">
        <a href="{{ route('terlambat.index') }}" class="btn btn-outline-secondary">🔁 Reset</a>
    </div>
</form>

    {{-- Tabel Data --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-info">
                <tr>
                    <th>Nama</th>
                    <th>Waktu Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($terlambats as $data)
                <tr>
                    <td>{{ $data->anggota->nama ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->waktu_masuk)->format('d M Y, H:i') }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('terlambat.edit', $data->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                        <form action="{{ route('terlambat.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">🗑 Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Belum ada data keterlambatan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

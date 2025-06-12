@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">📋 Data Pelanggaran</h1>

    <a href="{{ route('pelanggaran.create') }}" class="btn btn-primary mb-3">
        + Tambah Pelanggaran
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol buka modal -->
    <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#filterModal">
        🔎 Filter
    </button>

    <!-- Modal Filter -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="GET" action="{{ route('pelanggaran.melanggar') }}">
            <div class="modal-header">
            <h5 class="modal-title" id="filterModalLabel">Filter Pelanggaran</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            <div class="mb-3">
                <label for="search" class="form-label">Cari Nama</label>
                <input type="text" name="search" class="form-control" value="{{ request('search') }}">
                <small class="text-muted">Kosongkan jika tidak ingin memfilter bagian ini</small>
            </div>

            <div class="mb-3">
                <label for="filter_jenis" class="form-label">Jenis Pelanggaran</label>
                <select name="filter_jenis" class="form-select">
                <option value="">Semua Jenis</option>
                <option value="Pelanggaran Etika Berpakaian" {{ request('filter_jenis') == 'Pelanggaran Etika Berpakaian' ? 'selected' : '' }}>Pelanggaran Etika Berpakaian</option>
                <option value="Kepemilikan Barang Terlarang" {{ request('filter_jenis') == 'Kepemilikan Barang Terlarang' ? 'selected' : '' }}>Kepemilikan Barang Terlarang</option>
                <option value="Perilaku Tidak Pantas" {{ request('filter_jenis') == 'Perilaku Tidak Pantas' ? 'selected' : '' }}>Perilaku Tidak Pantas</option>
                <option value="Pelanggaran Keamanan" {{ request('filter_jenis') == 'Pelanggaran Keamanan' ? 'selected' : '' }}>Pelanggaran Keamanan</option>
                <option value="Lainnya" {{ request('filter_jenis') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Dari Tanggal</label>
                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">Sampai Tanggal</label>
                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
            </div>

            <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Terapkan Filter</button>
            </div>
        </form>
        </div>
    </div>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-danger">
                <tr>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Waktu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pelanggarans as $data)
                <tr>
                    <td>{{ $data->anggota->nama ?? '-' }}</td>
                    <td><span class="badge bg-warning text-dark">{{ $data->jenis }}</span></td>
                    <td>{{ $data->deskripsi }}</td>
                    <td>
                        @if($data->foto)
                            <img src="{{ asset('storage/' . $data->foto) }}" width="80" class="img-thumbnail">
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($data->waktu)->format('d M Y, H:i') }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('pelanggaran.edit', $data->pelanggaran_id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                        <form action="{{ route('pelanggaran.destroy', $data->pelanggaran_id) }}" method="POST" onsubmit="return confirm('Hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">🗑 Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data pelanggaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

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

    <form method="GET" action="{{ route('pelanggaran.index') }}" class="mb-3 d-flex justify-content-start align-items-center gap-2">
        <select name="filter_jenis" class="form-select w-auto">
            <option value="">Semua Jenis</option>
            <option value="Pelanggaran Etika Berpakaian" {{ request('filter_jenis') == 'Pelanggaran Etika Berpakaian' ? 'selected' : '' }}>Pelanggaran Etika Berpakaian</option>
            <option value="Kepemilikan Barang Terlarang" {{ request('filter_jenis') == 'Kepemilikan Barang Terlarang' ? 'selected' : '' }}>Kepemilikan Barang Terlarang</option>
            <option value="Perilaku Tidak Pantas" {{ request('filter_jenis') == 'Perilaku Tidak Pantas' ? 'selected' : '' }}>Perilaku Tidak Pantas</option>
            <option value="Pelanggaran Keamanan" {{ request('filter_jenis') == 'Pelanggaran Keamanan' ? 'selected' : '' }}>Pelanggaran Keamanan</option>
            <option value="Lainnya" {{ request('filter_jenis') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
        <button type="submit" class="btn btn-danger">Filter</button>
    </form>


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
                    <td>{{ $data->deskripsi }}</td> <!-- 👈 INI YANG HARUS DITAMBAH -->
                    <td>
                        @if($data->foto)
                            <img src="{{ asset('storage/' . $data->foto) }}" width="80" class="img-thumbnail">
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($data->waktu)->format('d M Y, H:i') }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('pelanggaran.edit', $data->anggota_id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                        <form action="{{ route('pelanggaran.destroy', $data->anggota_id) }}" method="POST" onsubmit="return confirm('Hapus data?')">
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

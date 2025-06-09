@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Daftar Kehadiran</h2>
    <a href="{{ route('keaktifan.create') }}" class="btn btn-success mb-3">Tambah Kehadiran</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Acara</th>
                <th>Nama Mahasiswa</th>
                <th>Waktu Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_acara }}</td>
                <td>{{ $item->penyelenggara }}</td>
                <td>{{ $item->penyelenggara }}</td>
                <td>
                    <a href="{{ route('keaktifan.edit', $item->acara_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('keaktifan.destroy', $item->acara_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data kehadiran.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
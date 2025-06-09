@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Daftar Acara</h2>
    <a href="{{ route('acara.create') }}" class="btn btn-success mb-3">Tambah Acara</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Acara</th>
                <th>Penyelenggara</th>
                <th>Tanggal Acara</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_acara }}</td>
                <td>{{ $item->penyelenggara }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_acara)->format('d M Y, H:i') }}</td>
                <td>
                    <a href="{{ route('acara.edit', $item->acara_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('acara.destroy', $item->acara_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data acara.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
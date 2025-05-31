@extends('layouts.app')

@section('content')
    <h1>Data Terlambat</h1>
    <a href="{{ route('terlambat.create') }}">+ Tambah Data Terlambat</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Waktu Masuk</th>
            <th>Aksi</th>
        </tr>
        @foreach($terlambats as $data)
        <tr>
            <td>{{ $data->anggota->nama }}</td>
            <td>{{ $data->waktu_masuk }}</td>
            <td>
                <form action="{{ route('terlambat.destroy', $data->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus data?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection

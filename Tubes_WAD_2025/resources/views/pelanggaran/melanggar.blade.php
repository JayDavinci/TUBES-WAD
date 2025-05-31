@extends('layouts.app')

@section('content')
    <h1>Data Pelanggaran</h1>
    <a href="{{ route('pelanggaran.create') }}">+ Tambah Pelanggaran</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Foto</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
        @foreach($pelanggarans as $data)
        <tr>
            <td>{{ $data->anggota->nama }}</td>
            <td>{{ $data->jenis }}</td>
            <td>
                @if($data->foto)
                    <img src="{{ asset('storage/' . $data->foto) }}" width="80">
                @else
                    Tidak ada
                @endif
            </td>
            <td>{{ $data->waktu }}</td>
            <td>
                <form action="{{ route('pelanggaran.destroy', $data->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus data?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection

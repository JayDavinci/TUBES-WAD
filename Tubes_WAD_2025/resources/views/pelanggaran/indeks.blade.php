<!-- @extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-danger mb-4">Daftar Pelanggaran</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pelanggaran.create') }}" class="btn btn-danger mb-3">Tambah Pelanggaran</a>

    <table class="table table-bordered table-striped">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Jenis</th>
                <th>Foto</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggarans as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->anggota->nama }}</td>
                <td>{{ $p->jenis }}</td>
                <td>
                    @if($p->foto)
                        <img src="{{ asset('storage/' . $p->foto) }}" alt="foto" width="80">
                    @else
                        Tidak Ada
                    @endif
                </td>
                <td>{{ $p->waktu }}</td>
                <td>
                    <a href="{{ route('pelanggaran.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pelanggaran.destroy', $p->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection -->

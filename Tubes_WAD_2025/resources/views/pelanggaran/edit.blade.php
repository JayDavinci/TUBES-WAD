<!-- @extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-danger mb-4">Edit Pelanggaran</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Anggota</label>
            <select name="anggota_id" class="form-control" required>
                @foreach($anggota as $a)
                    <option value="{{ $a->id }}" {{ $a->id == $pelanggaran->anggota_id ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jenis Pelanggaran</label>
            <input type="text" name="jenis" class="form-control" value="{{ $pelanggaran->jenis }}" required>
        </div>
        <div class="mb-3">
            <label>Foto (kosongkan jika tidak diubah)</label>
            <input type="file" name="foto" class="form-control">
            @if($pelanggaran->foto)
                <img src="{{ asset('storage/' . $pelanggaran->foto) }}" alt="foto" width="80" class="mt-2">
            @endif
        </div>
        <div class="mb-3">
            <label>Waktu</label>
            <input type="datetime-local" name="waktu" class="form-control" value="{{ \Carbon\Carbon::parse($pelanggaran->waktu)->format('Y-m-d\TH:i') }}" required>
        </div>
        <button class="btn btn-danger">Update</button>
        <a href="{{ route('pelanggaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection -->

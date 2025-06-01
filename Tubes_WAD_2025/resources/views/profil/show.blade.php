@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Profil</h2>
    <table class="table">
        <tr>
            <th>Nama</th>
            <td>{{ $profil->nama }}</td>
        </tr>
        <tr>
            <th>NIM</th>
            <td>{{ $profil->nim }}</td>
        </tr>
        <tr>
            <th>Fakultas</th>
            <td>{{ $profil->fakultas }}</td>
        </tr>
        <tr>
            <th>Prodi</th>
            <td>{{ $profil->prodi }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ ucfirst($profil->jenis_kelamin) }}</td>
        </tr>
    </table>
    <a href="{{ route('profil.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
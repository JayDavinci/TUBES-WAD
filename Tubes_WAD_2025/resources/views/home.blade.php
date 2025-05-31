@extends('layouts.app')

@section('content')

<div class="text-center">
    <h1 class="text-danger">Selamat Datang di ASRI</h1>
    <p class="lead">Aplikasi Asisten Senior Residence</p>

     <div class="mt-4">
        <img src="{{ asset('images/Logo_Ditmawa.jpg') }}" alt="Gambar 1" class="img-fluid rounded shadow" width="400">
        <img src="{{ asset('images/SR_Logo.jpg') }}" alt="Gambar 2" class="img-fluid rounded shadow m-5" width="200
        ">
    </div>

    <!-- Tambah teks deskripsi di sini -->
  <p class="mt-3 text-justify">
    Senior Residents merupakan kakak yang bertanggung jawab dalam membina, membimbing, dan membantu mahasiswa asrama dalam menciptakan lingkungan asrama yang nyaman dan kondusif. Mereka berperan sebagai teladan dan fasilitator yang mendukung pengembangan karakter, kedisiplinan, dan kemandirian penghuni asrama. Selain itu, Senior Residents juga menjadi jembatan komunikasi antara mahasiswa dan pihak pengelola asrama, serta berperan aktif dalam menyelenggarakan berbagai program dan kegiatan positif yang bertujuan untuk meningkatkan kebersamaan, solidaritas, dan rasa kekeluargaan di lingkungan asrama. Dengan dedikasi dan komitmen mereka, Senior Residents memastikan terciptanya suasana yang harmonis dan mendukung tercapainya tujuan bersama di asrama.
  </p>
</div>
@endsection

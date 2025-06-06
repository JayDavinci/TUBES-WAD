@extends('layouts.app')

@section('content')
<div class="hero text-center">
    <h1 class="text-danger display-5 fw-bold" data-aos="fade-down">Selamat Datang di ASRI</h1>
    <p class="lead text-secondary" data-aos="fade-up">Aplikasi Asisten Senior Residence</p>

    <div class="d-flex justify-content-center flex-wrap gap-4 my-4" data-aos="zoom-in">
        <img src="{{ asset('images/Logo_Ditmawa.jpg') }}" alt="Ditmawa" class="img-fluid shadow rounded" style="max-width: 300px;">
        <img src="{{ asset('images/SR_Logo.jpg') }}" alt="Senior Resident" class="img-fluid shadow rounded" style="max-width: 180px;">
    </div>

    <div class="mx-auto mt-3" style="max-width: 900px;" data-aos="fade-up" data-aos-delay="100">
        <p class="text-justify text-muted fs-5">
            Senior Residents merupakan kakak yang bertanggung jawab dalam membina, membimbing, dan membantu mahasiswa asrama dalam menciptakan lingkungan asrama yang nyaman dan kondusif. Mereka berperan sebagai teladan dan fasilitator yang mendukung pengembangan karakter, kedisiplinan, dan kemandirian penghuni asrama.
        </p>
        <p class="text-justify text-muted fs-5">
            Selain itu, Senior Residents juga menjadi jembatan komunikasi antara mahasiswa dan pihak pengelola asrama, serta berperan aktif dalam menyelenggarakan berbagai program dan kegiatan positif yang bertujuan untuk meningkatkan kebersamaan, solidaritas, dan rasa kekeluargaan di lingkungan asrama.
        </p>
        <p class="text-justify text-muted fs-5">
            Dengan dedikasi dan komitmen mereka, Senior Residents memastikan terciptanya suasana yang harmonis dan mendukung tercapainya tujuan bersama di asrama.
        </p>
    </div>
</div>
@endsection

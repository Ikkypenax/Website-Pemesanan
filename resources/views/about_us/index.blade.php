@extends('layouts.layouts')

@section('title', 'about-us')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="display-4">About Us</h1>
        <p class="lead">CV. Sadjiwa Mitra Sembada</p>
    </div>

    <section class="mt-5">
        <h2 class="mb-4">Profil Perusahaan</h2>
        <div class="row mb-2    ">
            <div class="col-md-6 col-sm-12">
                <p>CV. Sadjiwa Mitra Sembada bergerak di bidang fotografi dan pengadaan videotron, dengan fokus utama pada pengadaan videotron berkualitas tinggi untuk berbagai kebutuhan.</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/company_profile.jpg') }}" alt="Company Profile" class="img-fluid rounded shadow-sm">
            </div>
        </div>
    </section>

    <section class="mt-5">
        <h3 class="mb-4">Visi</h3>
        <p>Menjadi perusahaan terdepan dalam pengadaan videotron dan layanan fotografi yang berkualitas dan terpercaya di Indonesia.</p>
    </section>

    <section class="mt-5">
        <h3 class="mb-4">Misi</h3>
        <ul class="list-unstyled">
            <li class="media mb-3">
                <img src="{{ asset('images/mission1.jpg') }}" class="mr-3 rounded shadow-sm" alt="Misi 1" width="64">
                <div class="media-body">
                    <p>Menyediakan produk videotron berkualitas tinggi sesuai kebutuhan pelanggan.</p>
                </div>
            </li>
            <li class="media mb-3">
                <img src="{{ asset('images/mission2.jpg') }}" class="mr-3 rounded shadow-sm" alt="Misi 2" width="64">
                <div class="media-body">
                    <p>Menyediakan layanan fotografi profesional dengan hasil yang memuaskan.</p>
                </div>
            </li>
            <li class="media mb-3">
                <img src="{{ asset('images/mission3.jpg') }}" class="mr-3 rounded shadow-sm" alt="Misi 3" width="64">
                <div class="media-body">
                    <p>Mengutamakan kepuasan pelanggan melalui layanan yang cepat dan tepat.</p>
                </div>
            </li>
            <li class="media mb-3">
                <img src="{{ asset('images/mission4.jpg') }}" class="mr-3 rounded shadow-sm" alt="Misi 4" width="64">
                <div class="media-body">
                    <p>Terus berinovasi untuk mengikuti perkembangan teknologi.</p>
                </div>
            </li>
        </ul>
    </section>
</div>
@endsection

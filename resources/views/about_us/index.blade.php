@extends('layouts.layouts')

@section('title', 'about-us')

@section('content')
<div class="reveal container py-5 mt-5">
    <div class="text-center">
        <h1 class="display-6 fw-bold">Tentang Kami</h1>
        <p class="text-muted">CV. Sadjiwa Mitra Sembada</p>
    </div>

    {{-- Section: Profil Perusahaan --}}
    <section class="mt-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-4">Profil Perusahaan</h2>
                <p class="lead text-muted">CV. Sadjiwa Mitra Sembada bergerak di bidang fotografi dan pengadaan videotron, dengan fokus utama pada pengadaan videotron berkualitas tinggi untuk berbagai kebutuhan.</p>
            </div>
            <div class="col-md-6 text-center">
                {{-- Image Placeholder --}}
                <img src="{{ asset('assets/images/about.jpg') }}" alt="Company Profile" class="img-fluid rounded shadow-sm" style="max-height: 300px; object-fit: cover;">
            </div>
        </div>
    </section>

    {{-- Section: Visi --}}
    <section class="mt-5 text-center">
        <h3 class="mb-4">Visi</h3>
        <p class="lead">"Menjadi perusahaan terdepan dalam pengadaan videotron dan layanan fotografi yang berkualitas dan terpercaya di Indonesia"</p>
    </section>

    {{-- Section: Misi --}}
    <section class="mt-5">
        <h3 class="text-center mb-5">Misi Kami</h3>
        <div class=" reveal row text-center">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-tv fa-2x mb-3 text-primary"></i>
                        <h5 class="card-title">Misi 1</h5>
                        <p class="card-text">Menyediakan produk videotron berkualitas tinggi sesuai kebutuhan pelanggan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-camera-retro fa-2x mb-3 text-primary"></i>
                        <h5 class="card-title">Misi 2</h5>
                        <p class="card-text">Menyediakan layanan fotografi profesional dengan hasil yang memuaskan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-thumbs-up fa-2x mb-3 text-primary"></i>
                        <h5 class="card-title">Misi 3</h5>
                        <p class="card-text">Mengutamakan kepuasan pelanggan melalui layanan yang cepat dan tepat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-lightbulb fa-2x mb-3 text-primary"></i>
                        <h5 class="card-title">Misi 4</h5>
                        <p class="card-text">Terus berinovasi untuk mengikuti perkembangan teknologi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

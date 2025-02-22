@extends('layouts.layouts')

@section('title', 'Beranda')

@section('content')

<head>
    <link rel="icon" href="{{ asset('sajiwa.ico') }}" type="image/x-icon">
</head>

    <div class="reveal main-banner wow fadeIn"
        style="background-image: url('{{ asset('assets/images/hero.png') }}'); height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 d-flex flex-column justify-content-center">
                    <div class="text-center left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                        data-wow-delay="1s">
                        <div class="w-100">
                            <h2>Dapatkan Produk Berkualitas <br> Bersama Kami</h2>
                            <p>Kami menyediakan solusi visual berkualitas <br> tinggi yang dirancang
                                untuk memenuhi kebutuhan anda.
                            </p>
                            <div class="position-relative z-10 pt-4">
                                {{-- <a href="{{ auth()->check() ? route('order.create') : route('login.user') }}" 
                                    class="btn btn-lg rounded-pill btn-custom">
                                    Pesan Sekarang
                                </a> --}}
                                <a href="{{ route('order.create') }}" 
                                    class="btn btn-lg rounded-pill btn-custom">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- service --}}
    <div class=" reveal about" style="background-color: #f8f8f8; padding: 90px 50px">
        <div class="section-heading text-black wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h2>Wujudkan <em>Event Impian</em> Bersama Kami </h2>
           <br>
            <p class="opacity-50" style="">CV. Sadjiwa Mitra Sembada, kami mengutamakan kualitas dalam setiap
                videotron yang kami sediakan.<br> kami menawarkan kejernihan gambar dan warna yang superior.
            </p>
        </div>
        <div class="row" style="">
            <div class="col-md-3 col-sm-12">
                <div class="h-100 service-item d-flex flex-column justify-content-center first-service">
                    <div class="icon"><i class="fa-solid fa-thumbs-up"></i>
                    </div>
                    <h4>Jaminan Kualitas</h4>
                    <p class="opacity-50" style="">Kami berkomitmen untuk memberikan produk dan layanan unggulan yang
                        memenuhi
                        standar tertinggi.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="h-100 service-item d-flex flex-column justify-content-center second-service">
                    <div class="icon"><i class="fa-solid fa-lightbulb"></i></div>
                    <h4>Solusi Inovatif</h4>
                    <p class="opacity-50" style="">Tim kami terus menjelajahi teknologi terbaru untuk memberikan
                        solusi yang inovatif
                        dan efektif.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="h-100 service-item d-flex flex-column justify-content-center third-service">
                    <div class="icon"><i class="fa-solid fa-person"></i></div>
                    <h4>Berpusat pada Pelanggan</h4>
                    <p class="opacity-50" style="">Kami memprioritaskan kebutuhan klien kami, menawarkan layanan dan
                        dukungan yang
                        dipersonalisasi
                        sepanjang proses.<a rel="nofollow" href="" target="_blank"></a></p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="h-100 service-item d-flex flex-column justify-content-center fourth-service">
                    <div class="icon"><i class="fa-regular fa-handshake"></i></div>
                    <h4>Profesional &amp; <br> Berpengalaman</h4>
                    <p class="opacity-50">Tim kami terdiri dari profesional berpengalaman yang bersemangat dengan apa yang
                        mereka lakukan
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- about --}}
    <div class="reveal "
    style="padding: 35px 0px; background: linear-gradient(135deg, #0069b6 0%, #009dae 100%, #7db9e8 100%);">
   <div class="container">
    <div class="section-heading text-white wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
        <h3 class="">Produk Unggulan Yang Kami Tawarkan </h3>
        <p class="opacity-75">Berikut adalah produk videtron yang sering dan banyak dipesan oleh berbagai EO serta
            produk yang memiliki kualitas unggulan.
        </p>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="card mx-auto" style="width: 100%">
                <img src="{{ asset('assets/images/p2.5.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">P1.5 Pro Indoor Qiangli</h5>
                    <p class="card-text">Solusi visual high-end untuk penggunaan indoorg.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mx-auto" style="width: 100%">
                <img src="{{ asset('assets/images/p8.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">P1 Pro Indoor Qiangli</h5>
                    <p class="card-text">LED display resolusi ultra tinggi untuk penggunaan indoor.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mx-auto" style="width: 100%">
                <img src="{{ asset('assets/images/p6.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">P1.2 Pro Indoor Qiangli</h5>
                    <p class="card-text">Display LED indoor dengan kualitas gambar sangat tajam.</p>
                </div>
            </div>
        </div>
    </div>

   </div>
</div>



    

    <div class="px-5" style="padding: 50px 0px; background-color: #f8f8f8;">
        <div class="section-heading text-black wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h3 class="">Dengarkan Konsumen Kita</h3>
            <p class="opacity-75">Berikut adalah review produk videtron yang sering dan banyak dipesan oleh berbagai EO serta
                produk yang memiliki kualitas unggulan.
            </p>
        </div>
        <div class="container mt-5">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper h-100">
                    <div class="swiper-slide h-100">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://cdn2.iconfinder.com/data/icons/flat-style-svg-icons-part-1/512/users_group_people_friends-512.png"
                                    alt="Avatar 1" class="rounded-circle me-3">
                                <div>
                                    <p class="card-text">"Pelayanan yang sangat memuaskan! Tim bekerja profesional dan
                                        hasilnya sangat memuaskan."</p>
                                    <h5 class="card-title">- Andi Wijaya</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://www.pngrepo.com/png/33585/180/woman.png"
                                    alt="Avatar 2" class="rounded-circle me-3">
                                <div>
                                    <p class="card-text">"Sangat profesional dan mudah diajak komunikasi. Hasil kerjanya
                                        sesuai dengan ekspektasi."</p>
                                    <h5 class="card-title">- Eka Putri</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://www.pngall.com/wp-content/uploads/12/Avatar-Profile-Vector-PNG-File.png"
                                    alt="Avatar 2" class="rounded-circle me-3">
                                <div>
                                    <p class="card-text">"Saya sangat puas dengan hasil kerja CV. Sadjiwa Mitra Sembada,
                                        terutama dalam hal penyediaan videotron."</p>
                                    <h5 class="card-title">- Budi Santoso</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://tse3.mm.bing.net/th?id=OIP.0petdFlwvJs_bDZzovF3PQHaIu&pid=Api&P=0&h=180"
                                    alt="Avatar 2" class="rounded-circle me-3">
                                <div>
                                    <p class="card-text">"Tim yang sangat berpengalaman dan hasil kerjanya rapi.
                                        Recommended untuk keperluan videotron dan photography."</p>
                                    <h5 class="card-title">- Citra Dewi</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan lebih banyak testimonial sesuai kebutuhan -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>



    {{-- @endsection --}}

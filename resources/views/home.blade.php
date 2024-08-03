@extends('layouts.layouts')

@section('title', 'home')

@section('content')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s" style="height: 100vh">
    <div class="container">
        <div class="d-flex">
            <div class="w-50 d-flex flex-column justify-content-center">
                <div class=" left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                    data-wow-delay="1s">
                    <div class="w-100">
                        <h2>Get The Latest App From App Stores</h2>
                        <p class="opacity-50">Chain App Dev is an app landing page HTML5 template based on
                            Bootstrap v5.1.3 CSS
                            layout provided by TemplateMo, a great website to download free CSS templates.
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-50">
                <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <img src="{{asset('assets/images/home_31.png')}}" alt="Logo">
                </div>
            </div>
        </div>
    </div>
</div>
{{-- service --}}
<div class="container about" style="padding: 50px 0px">
    <div class="section-heading text-black wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
        <h4 class="text-red">Wujudkan <em>Event Impian</em> Bersama Kami </h4>
        {{-- <img src="{{asset('assets/images/home_31.png')}}" alt="service"> --}}
        <p class="opacity-75">CV. Sadjiwa Mitra Sembada, kami mengutamakan kualitas dalam setiap videotron yang kami
            sediakan.
            Videotron kami menawarkan kejernihan gambar dan warna yang superior.
        </p>
    </div>
    <div class="d-flex" style="gap:12px">
        <div class="w-25">
            <div class="h-100 service-item d-flex flex-column justify-content-center first-service">
                <div class="icon"></div>
                <h4>Jaminan Kualitas</h4>
                <p class="opacity-50">Kami berkomitmen untuk memberikan produk dan layanan unggulan yang memenuhi
                    standar tertinggi.</p>
            </div>
        </div>
        <div class="w-25">
            <div class="h-100 service-item d-flex flex-column justify-content-center second-service">
                <div class="icon"></div>
                <h4>Solusi Inovatif</h4>
                <p class="opacity-50">Tim kami terus menjelajahi teknologi terbaru untuk memberikan solusi yang inovatif
                    dan efektif.</p>
            </div>
        </div>
        <div class="w-25">
            <div class="h-100 service-item d-flex flex-column justify-content-center third-service">
                <div class="icon"></div>
                <h4>Pendekatan Berpusat pada Pelanggan</h4>
                <p class="opacity-50">Kami memprioritaskan kebutuhan klien kami, menawarkan layanan dan dukungan yang
                    dipersonalisasi
                    sepanjang proses.<a rel="nofollow" href="" target="_blank"></a></p>
            </div>
        </div>
        <div class="w-25">
            <div class="h-100 service-item d-flex flex-column justify-content-center fourth-service">
                <div class="icon"></div>
                <h4>Profesional &amp; Berpengalaman</h4>
                <p class="opacity-50">Tim kami terdiri dari profesional berpengalaman yang bersemangat dengan apa yang
                    mereka lakukan
                </p>
            </div>
        </div>
    </div>
</div>

{{-- about --}}
<div id="about" class="about-us section">
    <div class="container">
        <div class="d-flex">
            <div class="w-50 align-self-center">
                <div class="section-heading">
                    <h4>About <em>What We Do</em> &amp; Who We Are</h4>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor incididunt ut
                        labore et dolore magna.</p> --}}
                </div>
                <div class="d-flex">
                    <div class="w-50">
                        <div class="box-item p-4">
                            <h4><a href="#">Maintance Problems</a></h4>
                            <p>Lorem Ipsum Text</p>
                        </div>
                    </div>
                    <div class="w-50">
                        <div class="box-item p-4">
                            <h4><a href="#">24/7 Support &amp; Help</a></h4>
                            <p>Lorem Ipsum Text</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="w-50">
                        <div class="box-item p-4">
                            <h4><a href="#">Fixing Issues About</a></h4>
                            <p>Lorem Ipsum Text</p>
                        </div>
                    </div>
                    <div class="w-50">
                        <div class="box-item p-4">
                            <h4><a href="#">Co. Development</a></h4>
                            <p>Lorem Ipsum Text</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-50">
                <div class="right-image d-flex justify-content-center">
                    <img src="{{asset('assets/images/home_31.png')}}" alt="Logo">
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}
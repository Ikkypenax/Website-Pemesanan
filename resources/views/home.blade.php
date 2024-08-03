@extends('layouts.layouts')

@section('title', 'home')

@section('content')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>Get The Latest App From App Stores</h2>
                                        <p>Chain App Dev is an app landing page HTML5 template based on Bootstrap v5.1.3 CSS
                                            layout provided by TemplateMo, a great website to download free CSS templates.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{asset('assets/images/home_31.png')}}"
                                    alt="Logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="services section">
        <div class="container">
            <div class="col-lg-8 offset-lg-2">
                <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h4>Wujudkan <em>Event Impian</em> Bersama Kami </h4>
                    <img src="{{asset('assets/images/home_31.png')}}" alt="service">
                    <p>CV. Sadjiwa Mitra Sembada, kami mengutamakan kualitas dalam setiap videotron yang kami sediakan.
                        Videotron kami menawarkan kejernihan gambar dan warna yang superior, memastikan pesan Anda
                        tersampaikan dengan maksimal dan menarik perhatian. <a rel="nofollow" href="https://www.toocss.com/"
                            target="_blank"></a>
                        <a href="https://templatemo.com/contact" target="_parent"></a> Kenapa harus kami ?
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="service-item first-service">
                    <div class="icon"></div>
                    <h4>Jaminan Kualitas</h4>
                    <p>Kami berkomitmen untuk memberikan produk dan layanan unggulan yang memenuhi standar tertinggi.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="service-item second-service">
                    <div class="icon"></div>
                    <h4>Solusi Inovatif</h4>
                    <p>Tim kami terus menjelajahi teknologi terbaru untuk memberikan solusi yang inovatif dan efektif.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="service-item third-service">
                    <div class="icon"></div>
                    <h4>Pendekatan Berpusat pada Pelanggan</h4>
                    <p>Kami memprioritaskan kebutuhan klien kami, menawarkan layanan dan dukungan yang dipersonalisasi
                        sepanjang proses.<a rel="nofollow" href="" target="_blank"></a></p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="service-item fourth-service">
                    <div class="icon"></div>
                    <h4>Profesional &amp; Berpengalaman</h4>
                    <p>Tim kami terdiri dari profesional berpengalaman yang bersemangat dengan apa yang mereka lakukan
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="section-heading">
                        <h4>About <em>What We Do</em> &amp; Who We Are</h4>
                        <img src="public/assets/images/heading-line-dec.png" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#">Maintance Problems</a></h4>
                                <p>Lorem Ipsum Text</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#">24/7 Support &amp; Help</a></h4>
                                <p>Lorem Ipsum Text</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#">Fixing Issues About</a></h4>
                                <p>Lorem Ipsum Text</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#">Co. Development</a></h4>
                                <p>Lorem Ipsum Text</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-image">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- @endsection --}}

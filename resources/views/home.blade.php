@extends('layouts.layouts')

@section('title', 'home')

@section('content')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s" style="height: 100vh">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 d-flex flex-column justify-content-center">
                    <div class=" left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                        <div class="w-100">
                            <h2>Get The Latest App From App Stores</h2>
                            <p class="opacity-50">Chain App Dev is an app landing page HTML5 template based on
                                Bootstrap v5.1.3 CSS
                                layout provided by TemplateMo, a great website to download free CSS templates.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="{{ asset('assets/images/home_31.png') }}" alt="Logo">
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
        <div class="row" style="">
            <div class="col-md-3 col-sm-12">
                <div class="h-100 service-item d-flex flex-column justify-content-center first-service">
                    <div class="icon"> <div class="star-rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733; <!-- 5 out of 5 stars -->
                    </div></i></div>
                    <h4>Jaminan Kualitas</h4>
                    <p class="opacity-50">Kami berkomitmen untuk memberikan produk dan layanan unggulan yang memenuhi
                        standar tertinggi.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="h-100 service-item d-flex flex-column justify-content-center second-service">
                    <div class="icon"></div>
                    <h4>Solusi Inovatif</h4>
                    <p class="opacity-50">Tim kami terus menjelajahi teknologi terbaru untuk memberikan solusi yang inovatif
                        dan efektif.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="h-100 service-item d-flex flex-column justify-content-center third-service">
                    <div class="icon"></div>
                    <h4>Pendekatan Berpusat pada Pelanggan</h4>
                    <p class="opacity-50">Kami memprioritaskan kebutuhan klien kami, menawarkan layanan dan dukungan yang
                        dipersonalisasi
                        sepanjang proses.<a rel="nofollow" href="" target="_blank"></a></p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
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
            <div class="row" style="">
                <div class="col-md-6 col-sm-12 align-self-center">
                    <div class="section-heading">
                        <h4>Apa saja sih yang<em> Kami Tawarkan</em></h4>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor incididunt ut
                        labore et dolore magna.</p> --}}
                    </div>
                    <div class="row mb-2" style="">
                        <div class="col-md-6 col-sm-12">
                            <div class="box-item p-4">
                                <h4><a href="#">Maintance Problems</a></h4>
                                <p>Perawatan dan Perbaikan Alat</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="box-item p-4">
                                <h4><a href="#">24/7 Support &amp; Help</a></h4>
                                <p>Siap Membantu Kapanpun Dimanapun</p>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="">
                        <div class="col-md-6 col-sm-12">
                            <div class="box-item p-4">
                                <h4><a href="#">Fixing Issues About</a></h4>
                                <p>Memperbaiki Masalah dan Kendala</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="box-item p-4">
                                <h4><a href="#">Installation</a></h4>
                                <p>Pemasangan Alat</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="right-image d-flex justify-content-center">
                        <img src="{{ asset('assets/images/home_31.png') }}" alt="Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- review --}}
    <div class="container review" style="padding: 130px 0px">
        <div class="section-heading text-black wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4 class="text-red">Produk Unggulan Yang Kami Tawarkan </h4>
            <p class="opacity-75">Berikut adalah produk videtron yang sering dan banyak dipesan oleh berbagai EO serta produk yang memiliki kualitas unggulan.
            </p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="https://i.pinimg.com/originals/19/eb/43/19eb439307aadf4e339324323b0b6ca6.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 72 72">
                            <path fill="#FFF" d="M4 51.624h64v7.267H4z" />
                            <circle cx="35.996" cy="16.008" r="5" fill="#FFF" />
                            <path fill="#F1B31C" d="M4 51.624h64v7.267H4z" />
                            <path fill="#FCEA2B" d="M7 11a5 5 0 0 1 0 10m58 0a5 5 0 0 1 0-10" />
                            <path fill="#FCEA2B" d="M64.967 17.494c0 9.082-7.361 16.443-16.442 16.443h-.287c-9.081 0-11.443-7.361-11.443-16.443h-2.074c0 9.082-2.361 16.443-11.442 16.443h.164a16.418 16.418 0 0 1-13.042-6.427A16.37 16.37 0 0 1 7 17.494V11v40.624h58V11" />
                            <circle cx="35.996" cy="16.008" r="5" fill="#FCEA2B" />
                            <g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2">
                                <path d="M4 51.624h64v7.267H4zM7 11v40.624h58V11" />
                                <path d="M7 11a5 5 0 0 1 0 10" />
                                <path d="M23.443 33.937a16.418 16.418 0 0 1-13.042-6.427A16.371 16.371 0 0 1 7 17.494m57.967 0c0 9.082-7.361 16.443-16.442 16.443" />
                                <circle cx="35.996" cy="16.008" r="5" />
                                <path d="M65 21a5 5 0 0 1 0-10M4 51.624h64v7.267H4zM7 11a5 5 0 0 1 0 10" />
                                <path d="M65 21a5 5 0 0 1 0-10" />
                                <path d="M34.597 20.874c-.588 7.46-3.396 13.063-11.318 13.063h.164a16.418 16.418 0 0 1-13.042-6.427A16.37 16.37 0 0 1 7 17.494V11v40.624h58V11" />
                                <path d="M64.967 17.494c0 9.082-7.361 16.443-16.442 16.443h-.287c-7.906 0-10.72-5.58-11.315-13.016" />
                                <circle cx="35.996" cy="16.008" r="5" />
                            </g>
                        </svg>
                        <h5 class="card-title">First Product</h5>
                        <p class="card-text">Some representative placeholder content for the first product review.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="https://i.pinimg.com/originals/19/eb/43/19eb439307aadf4e339324323b0b6ca6.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 72 72">
                            <path fill="#FFF" d="M4 51.624h64v7.267H4z" />
                            <circle cx="35.996" cy="16.008" r="5" fill="#FFF" />
                            <path fill="#F1B31C" d="M4 51.624h64v7.267H4z" />
                            <path fill="#FCEA2B" d="M7 11a5 5 0 0 1 0 10m58 0a5 5 0 0 1 0-10" />
                            <path fill="#FCEA2B" d="M64.967 17.494c0 9.082-7.361 16.443-16.442 16.443h-.287c-9.081 0-11.443-7.361-11.443-16.443h-2.074c0 9.082-2.361 16.443-11.442 16.443h.164a16.418 16.418 0 0 1-13.042-6.427A16.37 16.37 0 0 1 7 17.494V11v40.624h58V11" />
                            <circle cx="35.996" cy="16.008" r="5" fill="#FCEA2B" />
                            <g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2">
                                <path d="M4 51.624h64v7.267H4zM7 11v40.624h58V11" />
                                <path d="M7 11a5 5 0 0 1 0 10" />
                                <path d="M23.443 33.937a16.418 16.418 0 0 1-13.042-6.427A16.371 16.371 0 0 1 7 17.494m57.967 0c0 9.082-7.361 16.443-16.442 16.443" />
                                <circle cx="35.996" cy="16.008" r="5" />
                                <path d="M65 21a5 5 0 0 1 0-10M4 51.624h64v7.267H4zM7 11a5 5 0 0 1 0 10" />
                                <path d="M65 21a5 5 0 0 1 0-10" />
                                <path d="M34.597 20.874c-.588 7.46-3.396 13.063-11.318 13.063h.164a16.418 16.418 0 0 1-13.042-6.427A16.37 16.37 0 0 1 7 17.494V11v40.624h58V11" />
                                <path d="M64.967 17.494c0 9.082-7.361 16.443-16.442 16.443h-.287c-7.906 0-10.72-5.58-11.315-13.016" />
                                <circle cx="35.996" cy="16.008" r="5" />
                            </g>
                        </svg>
                        <h5 class="card-title">Second Product</h5>
                        <p class="card-text">Some representative placeholder content for the second product review.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="https://i.pinimg.com/originals/19/eb/43/19eb439307aadf4e339324323b0b6ca6.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 72 72">
                            <path fill="#FFF" d="M4 51.624h64v7.267H4z" />
                            <circle cx="35.996" cy="16.008" r="5" fill="#FFF" />
                            <path fill="#F1B31C" d="M4 51.624h64v7.267H4z" />
                            <path fill="#FCEA2B" d="M7 11a5 5 0 0 1 0 10m58 0a5 5 0 0 1 0-10" />
                            <path fill="#FCEA2B" d="M64.967 17.494c0 9.082-7.361 16.443-16.442 16.443h-.287c-9.081 0-11.443-7.361-11.443-16.443h-2.074c0 9.082-2.361 16.443-11.442 16.443h.164a16.418 16.418 0 0 1-13.042-6.427A16.37 16.37 0 0 1 7 17.494V11v40.624h58V11" />
                            <circle cx="35.996" cy="16.008" r="5" fill="#FCEA2B" />
                            <g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2">
                                <path d="M4 51.624h64v7.267H4zM7 11v40.624h58V11" />
                                <path d="M7 11a5 5 0 0 1 0 10" />
                                <path d="M23.443 33.937a16.418 16.418 0 0 1-13.042-6.427A16.371 16.371 0 0 1 7 17.494m57.967 0c0 9.082-7.361 16.443-16.442 16.443" />
                                <circle cx="35.996" cy="16.008" r="5" />
                                <path d="M65 21a5 5 0 0 1 0-10M4 51.624h64v7.267H4zM7 11a5 5 0 0 1 0 10" />
                                <path d="M65 21a5 5 0 0 1 0-10" />
                                <path d="M34.597 20.874c-.588 7.46-3.396 13.063-11.318 13.063h.164a16.418 16.418 0 0 1-13.042-6.427A16.37 16.37 0 0 1 7 17.494V11v40.624h58V11" />
                                <path d="M64.967 17.494c0 9.082-7.361 16.443-16.442 16.443h-.287c-7.906 0-10.72-5.58-11.315-13.016" />
                                <circle cx="35.996" cy="16.008" r="5" />
                            </g>
                        </svg>
                        <h5 class="card-title">Third Product</h5>
                        <p class="card-text">Some representative placeholder content for the third product review.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- @endsection --}}

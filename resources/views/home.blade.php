@extends('layouts.layouts')

@section('title', 'home')

@section('content')
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
                            <div class="position-relative z-10">
                                <button class="btn btn-primary btn-md">Order Now</button>
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
       <div class="row align-items-center">
           <!-- Left Image -->
           <div class="col-md-5 col-sm-12 text-center">
               <div class="left-image">
                   <img class="w-100" src="{{ asset('assets/images/csbg3.png') }}" alt="Logo">
               </div>
           </div>

           <!-- Right Content -->
           <div class="col-md-7 col-sm-12">
               <div class="section-heading" style="color: #fff;">
                   <h2>Kami Siap Untuk <em> Membantu Anda </em></h2>
                   <p class="text-white-50">Kami siap memberikan pelayanan terbaik dan dukungan kepada setiap pelanggan kami.</p>
               </div>

               <div class="reveal row mb-3">
                   <div class="col-md-6 col-sm-12 mb-3">
                       <div class="box-item p-4 h-100 shadow-sm rounded bg-white" style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
                           <h4 class="text-center"><i class="bi bi-heart-fill" style="color: #ffcc00; font-size: 24px;"></i> Perawatan Panel </h4>
                           <hr>
                           <p class="text-center text-secondary"> Membantu dalam perawatan panel anda.</p>
                       </div>
                   </div>
                   <div class="col-md-6 col-sm-12 mb-3">
                       <div class="box-item p-4 h-100 shadow-sm rounded bg-white">
                           <h4 class="text-center"><i class="bi bi-lightning-fill" style="color: #ffcc00; font-size: 24px;"></i> Instalasi</h4><hr>
                           <p class="text-center text-secondary">Siap dalam melakukan Instalasi panel dengan cepat.</p>
                       </div>
                   </div>
               </div>

               <div class="reveal row mb-3">
                   <div class="col-md-6 col-sm-12 mb-3">
                       <div class="box-item p-4 h-100 shadow-sm rounded bg-white">
                           <h4 class="text-center"><i class="bi bi-bar-chart-fill" style="color: #ffcc00; font-size: 24px;"></i> Teknisi 24 Jam</h4><hr>
                           <p class="text-center text-secondary">Teknisi yang selalu siap sedia untuk membantu anda.</p>
                       </div>
                   </div>
                   <div class="col-md-6 col-sm-12 mb-3">
                       <div class="box-item p-4 h-100 shadow-sm rounded bg-white">
                           <h4 class="text-center"><i class="bi bi-emoji-smile-fill" style="color: #ffcc00; font-size: 24px;"></i> Kepuasan</h4><hr>
                           <p class="text-center text-secondary">Kepuasan pelanggan dan kualitas adalah tujuan utama kita.</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

    {{-- review --}}
    <div class="reveal px-5" style="background-color: #f8f8f8; padding: 95px 0px; ">
        <div class="section-heading text-black wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 72 72">
                            <path fill="#FFF" d="M4 51.624h64v7.267H4z" />
                            <circle cx="35.996" cy="16.008" r="5" fill="#FFF" />
                            <path fill="#F1B31C" d="M4 51.624h64v7.267H4z" />
                            <path fill="#FCEA2B" d="M7 11a5 5 0 0 1 0 10m58 0a5 5 0 0 1 0-10" />
                            <path fill="#FCEA2B"
                                d="M64.967 17.494c0 9.082-7.361 16.443-16.442 16.443h-.287c-9.081 0-11.443-7.361-11.443-16.443h-2.074c0 9.082-2.361 16.443-11.442 16.443h.164a16.418 16.418 0 0 1-13.042-6.427A16.37 16.37 0 0 1 7 17.494V11v40.624h58V11" />
                            <circle cx="35.996" cy="16.008" r="5" fill="#FCEA2B" />
                            <g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="2">
                                <path d="M4 51.624h64v7.267H4zM7 11v40.624h58V11" />
                                <path d="M7 11a5 5 0 0 1 0 10" />
                                <path
                                    d="M23.443 33.937a16.418 16.418 0 0 1-13.042-6.427A16.371 16.371 0 0 1 7 17.494m57.967 0c0 9.082-7.361 16.443-16.442 16.443" />
                                <circle cx="35.996" cy="16.008" r="5" />
                                <path d="M65 21a5 5 0 0 1 0-10M4 51.624h64v7.267H4zM7 11a5 5 0 0 1 0 10" />
                                <path d="M65 21a5 5 0 0 1 0-10" />
                                <path
                                    d="M34.597 20.874c-.588 7.46-3.396 13.063-11.318 13.063h.164a16.418 16.418 0 0 1-13.042-6.427A16.37 16.37 0 0 1 7 17.494V11v40.624h58V11" />
                                <path
                                    d="M64.967 17.494c0 9.082-7.361 16.443-16.442 16.443h-.287c-7.906 0-10.72-5.58-11.315-13.016" />
                                <circle cx="35.996" cy="16.008" r="5" />
                            </g>
                        </svg>
                        <h5 class="card-title">P1.5 Pro Indoor Qiangli</h5>
                        <p class="card-text">Solusi visual high-end untuk penggunaan indoor, cocok untuk pusat perbelanjaan mewah dan area resepsi hotel berbintang.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mx-auto" style="width: 100%">
                    <img src="{{ asset('assets/images/p8.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 72 72">
                            <path fill="#FFF" d="M4 51.624h64v7.267H4z" />
                            <circle cx="35.996" cy="16.008" r="5" fill="#FFF" />
                            <path fill="#F1B31C" d="M4 51.624h64v7.267H4z" />
                            <path fill="#FCEA2B" d="M7 11a5 5 0 0 1 0 10m58 0a5 5 0 0 1 0-10" />
                            <path fill="#FCEA2B"
                                d="M64.967 17.494c0 9.082-7.361 16.443-16.442 16.443h-.287c-9.081 0-11.443-7.361-11.443-16.443h-2.074c0 9.082-2.361 16.443-11.442 16.443h.164a16.418 16.418 0 0 1-13.042-6.427A16.37 16.37 0 0 1 7 17.494V11v40.624h58V11" />
                            <circle cx="35.996" cy="16.008" r="5" fill="#FCEA2B" />
                            <g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="2">
                                <path d="M4 51.624h64v7.267H4zM7 11v40.624h58V11" />
                                <path d="M7 11a5 5 0 0 1 0 10" />
                                <path
                                    d="M23.443 33.937a16.418 16.418 0 0 1-13.042-6.427A16.371 16.371 0 0 1 7 17.494m57.967 0c0 9.082-7.361 16.443-16.442 16.443" />
                                <circle cx="35.996" cy="16.008" r="5" />
                                <path d="M65 21a5 5 0 0 1 0-10M4 51.624h64v7.267H4zM7 11a5 5 0 0 1 0 10" />
                                <path d="M65 21a5 5 0 0 1 0-10" />
                                <path
                                    d="M34.597 20.874c-.588 7.46-3.396 13.063-11.318 13.063h.164a16.418 16.418 0 0 1-13.042-6.427A16.37 16.37 0 0 1 7 17.494V11v40.624h58V11" />
                                <path
                                    d="M64.967 17.494c0 9.082-7.361 16.443-16.442 16.443h-.287c-7.906 0-10.72-5.58-11.315-13.016" />
                                <circle cx="35.996" cy="16.008" r="5" />
                            </g>
                        </svg>
                        <h5 class="card-title">P1 Pro Indoor Qiangli</h5>
                        <p class="card-text">LED display resolusi ultra tinggi untuk penggunaan indoor,
                            cocok untuk ruang kontrol, studio siaran,
                            dan area pameran premium dengan kebutuhan visual detail tinggi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mx-auto" style="width: 100%">
                    <img src="{{ asset('assets/images/p6.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 72 72">
                            <path fill="#FFF" d="M4 51.624h64v7.267H4z" />
                            <circle cx="35.996" cy="16.008" r="5" fill="#FFF" />
                            <path fill="#F1B31C" d="M4 51.624h64v7.267H4z" />
                            <path fill="#FCEA2B" d="M7 11a5 5 0 0 1 0 10m58 0a5 5 0 0 1 0-10" />
                            <path fill="#FCEA2B"
                                d="M64.967 17.494c0 9.082-7.361 16.443-16.442 16.443h-.287c-9.081 0-11.443-7.361-11.443-16.443h-2.074c0 9.082-2.361 16.443-11.442 16.443h.164a16.418 16.418 0 0 1-13.042-6.427A16.37 16.37 0 0 1 7 17.494V11v40.624h58V11" />
                            <circle cx="35.996" cy="16.008" r="5" fill="#FCEA2B" />
                            <g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="2">
                                <path d="M4 51.624h64v7.267H4zM7 11v40.624h58V11" />
                                <path d="M7 11a5 5 0 0 1 0 10" />
                                <path
                                    d="M23.443 33.937a16.418 16.418 0 0 1-13.042-6.427A16.371 16.371 0 0 1 7 17.494m57.967 0c0 9.082-7.361 16.443-16.442 16.443" />
                                <circle cx="35.996" cy="16.008" r="5" />
                                <path d="M65 21a5 5 0 0 1 0-10M4 51.624h64v7.267H4zM7 11a5 5 0 0 1 0 10" />
                                <path d="M65 21a5 5 0 0 1 0-10" />
                                <path
                                    d="M34.597 20.874c-.588 7.46-3.396 13.063-11.318 13.063h.164a16.418 16.418 0 0 1-13.042-6.427A16.37 16.37 0 0 1 7 17.494V11v40.624h58V11" />
                                <path
                                    d="M64.967 17.494c0 9.082-7.361 16.443-16.442 16.443h-.287c-7.906 0-10.72-5.58-11.315-13.016" />
                                <circle cx="35.996" cy="16.008" r="5" />
                            </g>
                        </svg>
                        <h5 class="card-title">P1.2 Pro Indoor Qiangli</h5>
                        <p class="card-text">Display LED indoor dengan kualitas gambar sangat tajam, ideal untuk ruang rapat eksekutif dan lobi perusahaan besar.</p>
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
                                <img src="https://i.pinimg.com/originals/85/39/12/8539121611693888d68bef623138b3db.jpg"
                                    alt="Avatar 1" class="rounded-circle me-3">
                                <div>
                                    <p class="card-text">"Pelayanan yang sangat memuaskan! Tim bekerja profesional dan hasilnya sangat memuaskan."</p>
                                    <h5 class="card-title">- Andi Wijaya</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://i.pinimg.com/originals/85/39/12/8539121611693888d68bef623138b3db.jpg"
                                    alt="Avatar 2" class="rounded-circle me-3">
                                <div>
                                    <p class="card-text">"Sangat profesional dan mudah diajak komunikasi. Hasil kerjanya sesuai dengan ekspektasi."</p>
                                    <h5 class="card-title">- Eka Putri</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://i.pinimg.com/originals/85/39/12/8539121611693888d68bef623138b3db.jpg"
                                    alt="Avatar 2" class="rounded-circle me-3">
                                <div>
                                    <p class="card-text">"Saya sangat puas dengan hasil kerja CV. Sadjiwa Mitra Sembada, terutama dalam hal penyediaan videotron."</p>
                                    <h5 class="card-title">- Budi Santoso</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://i.pinimg.com/originals/85/39/12/8539121611693888d68bef623138b3db.jpg"
                                    alt="Avatar 2" class="rounded-circle me-3">
                                <div>
                                    <p class="card-text">"Tim yang sangat berpengalaman dan hasil kerjanya rapi. Recommended untuk keperluan videotron dan photography."</p>
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

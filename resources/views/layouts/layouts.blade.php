<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('sajiwa.ico') }}" type="image/x-icon">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        nav {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 75px;
            display: flex;
            align-items: center;
            background: #fff;
            /* backdrop-filter: blur(10px); */
            /* box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); */
            transition: background-color 0.3s, backdrop-filter 0.3s;
            z-index: 1000;
            padding: 0 15px;
            box-sizing: border-box;
        }

        nav.solid {
            background: #fff;
            /* opacity: 80%; */
            backdrop-filter: blur(0px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        nav .navbar {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        nav .navbar .logo a {
            color: #003865;
            font-size: 27px;
            font-weight: 600;
            text-decoration: none;
        }

        nav .navbar .menu {
            display: flex;
            padding-top: inherit;
        }

        nav .navbar .menu li {
            list-style: none;
            margin: 6px 15px;
            margin-top: 15px;
            padding-top: 9px;
        }

        nav .navbar .menu li a {
            font-size: 17px;
            font-weight: 700;
            text-decoration: none;
        }

        nav .navbar .menu li a:hover {
            color: #0074c8;
        }

        nav .navbar .menu .nav-button a {
            color: #003865;
        }

        /* Btn Pesan Sekarang - Navbar */
        .order-button {
            background-color: #005a9e;
            cursor: pointer;
            border-radius: 10px;
            max-width: auto;
            transition: all 0.3s;
            text-align: left;
            margin-top: -10px;

        }

        .order-button a {
            display: block;
            color: #ffffff;
            font-size: 17px;
            font-weight: 700;
            text-decoration: none;
        }

        .order-button:hover {
            background-color: #33aaff;
            box-shadow: 0px 0px 16px rgba(51, 170, 255, 0.5);
        }

        nav .navbar .menu .order-button:hover a {
            color: #000000;
        }

        .menu-trigger {
            display: none;
            color: #003865;
            font-size: 24px;
            cursor: pointer;
            justify-content: center;
        }

        /* responsive */
        @media (max-width: 1140px) {
            nav .navbar .menu {
                display: none;
                flex-direction: column;
                position: fixed;
                top: 75px;
                left: 0;
                width: 100%;
                height: 300px;
                background: #eeeeee;
            }

            .navbar {
                display: flex;
                flex-direction: column;
                justify-content: space-around;
            }

            .navbar.menu-trigger {
                display: flex
            }

            nav .navbar .menu.open {
                display: flex;
            }

            .menu-trigger {
                display: block;
            }
        }

        @media (max-width: 370px) {

            nav .navbar .menu {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 75px;
                left: 0;
                width: 100%;
                background: #022833;
            }

            .navbar {
                flex-direction: column;

                align-items: center;

                justify-content: flex-end;
                padding-bottom: 30px;

            }

            .navbar .menu-trigger {
                display: flex;

                position: ab bottom: 10px;

                left: 50%;
                transform: translateX(-50%);

            }
        }

        /* Btn Pesan Sekarang - Hero */
        .btn-custom {
            color: #ffffff;
            padding: 12px 30px;
            font-size: 18pt;
            font-weight: 500;
            transition: all 0.3s ease;
            background: linear-gradient(145deg, #00d4ff, #0047ff);
            border-color: transparent;
            box-shadow: 0 0 15px rgba(0, 212, 255, 0.6),
                0 0 30px rgba(0, 71, 255, 0.4);
        }

        .btn-custom:hover {
            color: #0059ff;
            background: linear-gradient(145deg, #ffffff, #ffffff);
            border-color: transparent;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.6),
                0 0 30px rgba(255, 255, 255, 0.911);
        }

        /* Form pesanan */
        .card-order {
            max-width: 800px;
            margin: auto;
            margin-top: 130px;
            margin-bottom: 50px;
            border: 1px solid #ddd;
            padding: 0;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-order .form-group-ord {
            margin: 15px;
        }

        .card-order .form-label-ord {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .card-order .form-control-ord {
            width: 100%;
            padding: 6px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            font-size: 14px;
            color: #495057;
        }

        .card-order .form-control-plaintext-ord {
            padding: 10px;
            font-size: 14px;
            color: #424242;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #f8f9fa;
        }

        .card-order .form-group .row {
            display: flex;
            flex-wrap: wrap;
        }

        .card-order .form-group.row .col {
            flex: 1;
            min-width: auto;
            padding-left: 0;
            margin-left: 0;
        }

        .card-order .form-group.row .col:last-child {
            padding-right: 0;
        }

        .card-order .btn-success {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            margin-right: 15px;
            font-size: 16px;
            border-radius: 5px;
            width: 25vh;
            align-self: flex-end;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card-order .btn-success:hover {
            background-color: #218838;
        }

        .card-order #result {
            font-size: 16pt;
            font-weight: bold;
            color: green;
        }

        .form-header {
            position: relative;
            text-align: center;
        }

        .form-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .one-section {
            display: flex;
            gap: 8px;
            margin: 14px;
            margin: 14px;
            padding-top: 24px;
        }

        .two-section {
            display: flex;
            padding: 12px;
            padding-bottom: 24px;
            justify-content: space-between;
        }

        .left-section,
        .right-section {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .header-background {
            position: relative;
            width: 100%;
            height: 250px;
            overflow: hidden;
        }

        .header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-content {
                flex-direction: column;
            }

            .right-section {
                align-items: stretch;
            }

            .btn-success {
                align-self: stretch;
            }

            .one-section {
                flex-direction: column
            }

            .two-section {
                flex-direction: column;
            }

        }

        .text-primary {
            margin-top: 16px;
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }

        #order .form-header h2 {
            color: #fff;
            font-size: 32px;
            font-weight: bold;
            z-index: 10;
            margin: 0;
        }

        .checkmark-wrapper {
            display: inline-block;
            margin-bottom: 10px;
        }

        .checkmark {
            font-size: 40px;
            color: green;
            opacity: 0;
            transform: scale(0);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        /* Efek transisi ketika modal muncul */
        #successModal.show .checkmark {
            opacity: 1;
            transform: scale(1);
        }

        /* Footer */
        .footer a {
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer i {
            font-size: 1.5rem;
        }

        .footer hr {
            border-color: #666;
            height: 1px;
            flex-grow: 1;
            margin: 0 10px;
        }

        .flex-grow-1 {
            flex-grow: 8;
            height: 1px;
        }

        .footer .d-flex {
            align-items: center;
            justify-content: center;
        }

        .footer .mx-3 {
            margin-left: 1.5rem;
            margin-right: 1.5rem;
        }

        .footer p {
            font-size: 20px;
        }

        .footer p i {
            margin-right: 5px;
        }

        .footer p {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .footer h2 {
            font-size: 30px;
            margin-bottom: 32px !important;
        }
    </style>
</head>

<body>
    <nav id="navbar">
        <div class="navbar">
            <div class="logo"><a href="/">Sadjiwa Mitra Sembada</a>
            </div>
            <a class="menu-trigger">
                <i class="bi bi-list"></i>
            </a>
            <ul class="menu">
                <li class="nav-button"><a href="/">Beranda</a></li>
                <li class="nav-button"><a href="./catalog/list">Katalog</a></li>
                <li class="nav-button"><a href="/about-us">Tentang Kami</a></li>
                <li class="nav-button">
                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Cek
                        Pesanan</a>
                </li>
                {{-- <li class="btn order-button px-3 py-2"><a href="/order">Pesan Sekarang</a></li> --}}
                <li><button class="btn order-button px-3 py-2" onclick="window.location.href='/order';"><a
                            href="/order">Pesan Sekarang</a></button></li>
            </ul>
        </div>
    </nav>

    {{-- Halaman Content --}}
    <div id="content">
        <div class="">
            @yield('content')
        </div>
    </div>

    <footer class="footer text-light pt-5 pb-2" style="background-color: #003865">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="mb-2">Sadjiwa Mitra Sembada</h2>
                </div>
            </div>
            <div class="row justify-content-center opacity-50">
                <div class="col-md-12 mb-4 d-flex justify-content-center align-items-center">
                    <!-- Email -->
                    <p class="mx-3 mb-0">
                        <a href="mailto:Sajiwamitrasembada@gmail.com" class="text-light text-decoration-none">
                            <i class="fas fa-envelope"></i> Sajiwamitrasembada@gmail.com
                        </a>
                    </p>
                    <!-- WhatsApp -->
                    <p class="mx-3 mb-0">
                        <a href="https://wa.me/6287839642255" class="text-light text-decoration-none" target="_blank">
                            <i class="fab fa-whatsapp"></i> +62 878-3964-2255
                        </a>
                    </p>
                    <!-- Address/Map -->
                    <p class="mx-3 mb-0">
                        <a href="https://www.google.com/maps/place/Jl.+Laksda+Adisucipto+No.64,+Ambarukmo,+Caturtunggal,+Kec.+Depok,+Kabupaten+Sleman,+Daerah+Istimewa+Yogyakarta+55281/@-7.7834905,110.405933,21z/data=!4m9!1m2!2m1!1sJalan+Laksda+Adisucipto,+No.+26,+Kel.+Caturtunggal!3m5!1s0x2e7a59e89c9584d3:0xa0e9063cea17610e!8m2!3d-7.7835017!4d110.4062328!16s%2Fg%2F11csksf1qg?entry=ttu&g_ep=EgoyMDI0MTAwMi4xIKXMDSoASAFQAw%3D%3D"
                            class="text-light text-decoration-none" target="_blank">
                            <i class="fas fa-map-marker-alt"></i> Jalan Laksda Adisucipto, No. 26, Kel. Caturtunggal
                        </a>
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10 d-flex align-items-center mb-3">

                    <hr class="flex-grow-1 border-secondary ">

                    <!-- Social Media Icons -->
                    <div class="d-flex justify-content-center mx-3 opacity-50">
                        <a href="#" class="text-light mx-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/wish_nugraha?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                            class="text-light mx-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light mx-2"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-light mx-2"><i class="fab fa-tiktok"></i></a>
                    </div>

                    <hr class="flex-grow-1 border-secondary m-0">

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 d-flex justify-content-center">
                    <span class="text-light mx-2 opacity-50 mb-4">Copyright &copy; 2024 CV. Sadjiwa Mitra
                        Sembada.</span>
                </div>
            </div>
        </div>
    </footer>


    <!-- Modal Cek Pesanan -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-black fs-5" id="exampleModalLabel">Cek Pesanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="checkOrderForm" action="{{ route('order.check') }}" method="GET">
                        <div class="mb-3">
                            <label for="orderCode" class="form-label text-black">Kode Pemesanan</label>
                            <input type="text" class="form-control" id="orderCode" name="order_code"
                                placeholder="Masukkan Kode Pemesanan" required>
                        </div>
                        @if ($errors->has('order_code'))
                            <div class="alert alert-danger">
                                {{ $errors->first('order_code') }}
                            </div>
                        @endif
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" form="checkOrderForm">Cek Pesanan</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Core Javascript --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('sb_admin2/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>


    <script>
        new WOW().init();

        document.querySelector('.menu-trigger').addEventListener('click', function() {
            document.querySelector('.menu').classList.toggle('open');
        });

        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('solid');
            } else {
                navbar.classList.remove('solid');
            }
        });
    </script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    
    <script>
        var swiper = new Swiper('.mySwiper', {
            grabCursor: true,
            slidesPerView: 2,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            loop: false,
            breakpoints: {
                768: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            }
        });
    </script>
    <script>
        window.addEventListener('scroll', function() {
            let scrollPosition = window.pageYOffset;
            document.querySelector('.main-banner').style.backgroundPositionY = -(scrollPosition * 0.5) + 'px';
        });
    </script>
</body>

</html>

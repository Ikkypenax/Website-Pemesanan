<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    #content {
        /* margin-left: 200px; */
        transition: all 0.3s;
    }

    .order-button {
        background: none;
        border: 2px solid currentColor;
        color: #C3444F;
        font-family: 'Poppins', sans-serif;
        font-size: 17px;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        padding: 5px 15px;
        border-radius: 15px;
        /* Membuat sudut membulat */
        transition: background-color 0.3s, color 0.3s;

    }

    .order-button:hover {
        background-color: #C3444F;
        color: #022833;
    }

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
        background: #022833;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        z-index: 99999;
    }

    nav .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 100%;
        max-width: 90%;
        background: #022833;
        margin: auto;
    }

    nav .navbar .logo a {
        color: #C3444F;
        font-size: 27px;
        font-weight: 600;
        text-decoration: none;
    }

    nav .navbar .menu {
        display: flex;
    }

    nav .navbar .menu li {
        list-style: none;
        margin: 0 15px;
        margin-top: 15px;
    }

    nav .navbar .menu li a {
        color: #C3444F;
        font-size: 17px;
        font-weight: 500;
        text-decoration: none;
    }

    nav .navbar .menu li a:hover {
        color: #96c7e8;
    }

    .menu-trigger {
        display: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        nav .navbar .menu {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 75px;
            left: 0;
            width: 100%;
            background: #022833;
        }

        nav .navbar .menu.open {
            display: flex;
        }

        .menu-trigger {
            display: block;
        }
    }

    section {
        display: flex;
        height: 100vh;
        width: 100%;
        align-items: center;
        justify-content: center;
        color: #96c7e8;
        font-size: 70px;
    }

    footer {
        background: #022833;
        color: #C3444F;
        padding: 20px 0;
        text-align: center;
    }

    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-content h3 {
        font-size: 2em;
        margin-bottom: 10px;
    }

    .footer-content p {
        max-width: 600px;
        margin: 0 auto 20px;
        font-size: 1.1em;
    }

    .socials {
        list-style: none;
        display: flex;
        justify-content: center;
        padding: 0;
    }

    .socials li {
        margin: 0 10px;
    }

    .socials a {
        color: white;
        font-size: 1.5em;
        text-decoration: none;
    }

    .footer-bottom {
        margin-top: 20px;
    }

    .footer-bottom p {
        margin: 0;
        font-size: 1em;
    }
</style>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo"><a href="/">Sadjiwa Mitra Sembada</a></div>
            <a class="menu-trigger">
                <i class="bi bi-list"></i>
            </a>
            <ul class="menu">
                <li><a href="/">Home</a></li>
                <li><a href="/catalog/list">Catalog</a></li>
                <li><a href="#About">About</a></li>
                <li><button onclick="location.href='#Feedback'" class="order-button">Order Now</button></li>
            </ul>
        </div>
    </nav>

    <div id="content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <div class="button">
        <a href="#"><i class="fas fa-arrow-up"></i></a>
    </div>

    <footer>
        <div class="footer-content socials">
            <div class="">
                <div class="col-12">
                    <h3>Sadjiwa Mitra Sembada</h3>
                    <p class="text-white opacity-75">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel
                        ligula
                        nunc. Duis
                        interdum lacus sit
                        amet arcu egestas, at sodales orci feugiat.</p>
                    <div class="d-flex opacity-25 justify-content-center" style="gap:8px">
                        <div>
                            <a href="">
                                <i class="text-white fa-brands fa-instagram"></i>
                            </a>
                        </div>
                        <div>
                            <i class="text-white fa-regular fa-envelope"></i>
                        </div>
                        <div>
                            <i class="text-white fa-brands fa-whatsapp"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-2 text-white opacity-25">© 2024 Sadjiwa Mitra Sembada</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();

        document.querySelector('.menu-trigger').addEventListener('click', function() {
            document.querySelector('.menu').classList.toggle('open');
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Get the button element
        const scrollToTopButton = document.getElementById('scrollToTop');

        // Function to scroll to the top of the page
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Add click event listener to the button
        scrollToTopButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            scrollToTop();
        });
    </script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Inisialisasi Swiper -->
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
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            }
        });
    </script>
</body>

</html>

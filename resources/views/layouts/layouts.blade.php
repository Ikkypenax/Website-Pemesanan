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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        #content {
            margin-left: 8px;
            margin-right: 8px;
            margin-top: 100px;
            transition: all 0.3s;
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
            color: #AD3B45;
            font-size: 17px;
            font-weight: 500;
            text-decoration: none;
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
            margin: 20px 0 0;
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
                <li><a href="#Feedback">Feedback</a></li>
            </ul>
        </div>
    </nav>

    <div id="content">
        <!-- Page Content -->
        <div class="container">
            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();

        document.querySelector('.menu-trigger').addEventListener('click', function() {
            document.querySelector('.menu').classList.toggle('open');
        });
    </script>

    <div class="button">
        <a href="#Home"><i class="fas fa-arrow-up"></i></a>
    </div>

    <footer>
        <div class="footer-content">
            <h3>Sadjiwa Mitra Sembada</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel ligula nunc. Duis interdum lacus sit amet arcu egestas, at sodales orci feugiat.</p>
            <ul class="socials">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Sadjiwa Mitra Sembada. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .container,
        .card {
            position: relative;
            z-index: 2;
        }

        .bg-form-login {
            background: linear-gradient(to bottom, #7579ff, #b224ef);
            border-radius: 10px;
        }

        .form-control-user {
            border: none;
            border-bottom: 2px solid #ddd;
            border-radius: 0;
            padding-left: 35px;
            padding-right: 10px;
            box-shadow: none;
            transition: border-color 0.3s;
        }

        .form-control-user:focus {
            border-bottom: 2px solid #7e54f3;
            outline: none;
        }

        .position-relative {
            position: relative;
        }

        .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            pointer-events: none;
        }

        .input-icon::placeholder {
            color: #999;
        }

        .btn-login {
            background-color: #ffffff;
            border: none;
            color: black;
            font-size: 12pt;
            font-weight: 500;
            width: 100px;
            border-radius: 14px;
        }

        .btn-login:hover {
            background-color: #cacaca;
            color: black;
        }

        .form-check-label {
            color: #555;
        }
    </style>
</head>



<body class="d-flex flex-column justify-content-center position-relative"
    style="background-image: url('{{ asset('assets/images/panel bg.png') }}'); height: 100vh; background-size: cover; background-position: center -130px;">

    <div class="overlay"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9 ">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12 bg-form-login">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-light mb-4">LOG IN</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login.submit') }}">
                                        @csrf

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="form-group position-relative">
                                            <input type="email" class="form-control form-control-user input-icon"
                                                id="email" name="email" aria-describedby="emailHelp"
                                                placeholder="Email" required autofocus>
                                            {{-- <i class="fas fa-envelope icon"></i> --}}
                                        </div>
                                        <div class="form-group position-relative">
                                            <input type="password" class="form-control form-control-user input-icon"
                                                id="password" name="password" placeholder="Password" required>
                                            {{-- <i class="fas fa-lock icon"></i> --}}
                                        </div>

                                        <div class="form-group form-check text-left">
                                            <input type="checkbox" class="form-check-input" id="remember"
                                                name="remember">
                                            <label class="form-check-label text-light" for="remember">Remember Me</label>
                                        </div>

                                        <div class="d-flex justify-content-center align-self-center">
                                            <button type="submit" class="btn btn-login ">
                                                Login
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="{{ asset('sb_admin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/js/sb-admin-2.min.js') }}"></script>
</body>

</html>

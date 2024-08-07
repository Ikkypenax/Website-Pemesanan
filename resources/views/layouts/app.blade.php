<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />

</head>

<style>
    .sidebar {
        width: 250px;
        /* Lebar sidebar */
        background-color: rgb(16, 15, 15);
        transition: width 0.3s ease;
    }

    .content-wrapper {
        margin-left: 250px;
        /* Lebar sidebar */
        transition: margin-left 0.3s ease;
    }

    .sidebar.toggled {
        width: 0;
    }

    .content-wrapper.toggled {
        margin-left: 0;
    }

    .table-container {
        display: flex;
        gap: 20px;
    }

    .table-container-edit {
        display: flex;
        margin-bottom: -17px;
    }

    .table-container .table-detail {
        flex: 1;
    }
</style>


<body id="page-top">

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->

        <ul class="navbar-nav sidebar sidebar-dark accordion">

            <!-- Sidebar - Brand -->
            <li class="nav-item m-2">
                <h4 class="navbar d-flex align-items-center justify-content-center">
                    <strong style="font-size: 20pt; font-weight: bold; color: white">SJM</strong>
                </h4>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="bi bi-speedometer2" style="font-size: 17pt"></i>
                    <span style="font-size: 14pt">Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="font-size: 8pt">
                Main Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/pesanan">
                    <i class="bi bi-list-check" style="font-size: 16pt"></i>
                    <span style="font-size: 12pt">Pesanan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/barang">
                    <i class="bi bi-boxes" style="font-size: 16pt"></i>
                    <span style="font-size: 12pt">Barang</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/catalog">
                    <i class="bi bi-images" style="font-size: 16pt"></i>
                    <span style="font-size: 12pt">Katalog</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <div class="mt-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="bi bi-door-open" style="font-size: 16pt"></i>
                        <span style="font-size: 12pt">Logout</span>
                    </a>
                </li>
            </div>

        </ul>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggle" class="btn btn-link">
                        <i class="bi bi-list" style="font-size: 16pt"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <div class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                @auth
                                    {{ Auth::user()->name }}
                                @endauth
                            </span>
                        </li>
                        <i class="bi bi-person-circle"></i>
                    </div>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb_admin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sb_admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb_admin2/js/sb-admin-2.min.js') }}"></script>

    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('toggled');
            document.getElementById('content-wrapper').classList.toggle('toggled');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({

                lengthMenu: [3, 6, 9, 12]
            });
        });
    </script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(function() {
                $('#provinsi').on('change', function() {
                    let id_provinsi = $('#provinsi').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkabupaten') }}",
                        data: {
                            id_provinsi: id_provinsi
                        },
                        cache: false,

                        success: function(msg) {
                            $('#kabupaten').html(msg);
                        },
                        error: function(data) {
                            console.log('error:', data)
                        },
                    })
                })
            })
        });
    </script>

    <!-- script form status -->
    <script>
        $(document).ready(function() {
            // Tanggapi perubahan pada dropdown
            $('select[name=status]').change(function() {
                var selectedColor = $(this).find('option:selected').css('background-color');
                $(this).css('background-color', selectedColor);
            });
        });
    </script>


</body>

</html>

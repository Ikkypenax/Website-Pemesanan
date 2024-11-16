<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('sajiwa.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>

<style>
    .sidebar {
        width: 250px;
        background-color: rgb(16, 15, 15);
        transition: width 0.3s ease;
    }

    #content-wrapper {
        transition: margin-left 0.3s ease;
    }

    .sidebar.toggled {
        width: 0;
    }

    #content-wrapper.toggled {
        margin-left: 0;
    }


    #sidebarTogglee {
        background-color: #ffffff;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    #sidebarTogglee:hover {
        background-color: #b0b0b0;
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        transform: scale(1.1);
    }

    #sidebarTogglee i {
        font-size: 16pt;
        color: black;
    }


    .table-orders,
    .table-panel,
    .table-catalog {
        color: black;
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

    .status-prosses {
        color: #ffb300;
    }

    .status-approve {
        color: #20bf6b;
    }

    .status-reject {
        color: #eb3b5a;
    }
</style>


<body id="page-top">

    {{-- Modal Logout --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih <b>"Logout"</b> jika anda yakin.</div>
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

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion">


            <!-- Sidebar - Brand SJM -->
            <li class="nav-item d-flex justify-content-center">
                <h4 class="navbar">
                    <strong style="font-size: 20pt; font-weight: bold; color: white">SJM</strong>
                </h4>

            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="bi bi-speedometer2" style="font-size: 17pt"></i>
                    <span style="font-size: 12pt">Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Nav Item - Heading Menu -->
            <div class="sidebar-heading" style="font-size: 8pt">
                Main Menu
            </div>

            <!-- Nav Item - Halaman Menu Collapse  -->
            <li class="nav-item">
                <a class="nav-link" href="/orders">
                    <i class="bi bi-list-check" style="font-size: 16pt"></i>
                    <span style="font-size: 12pt">Pesanan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/panel">
                    <i class="bi bi-boxes" style="font-size: 16pt"></i>
                    <span style="font-size: 12pt">Panel</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/catalog">
                    <i class="bi bi-images" style="font-size: 16pt"></i>
                    <span style="font-size: 12pt">Katalog</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Logout Button -->
            <li class="nav-item mt-auto" style="position: sticky; bottom: 0; margin-bottom: 0;">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="bi bi-door-open" style="font-size: 16pt;"></i>
                    <span style="font-size: 12pt">Logout</span>
                </a>
            </li>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar - Navbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarTogglee" style="font-size: 12pt;">
                        <i class="bi bi-list"></i>
                    </button>

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
                
                <!-- Halaman Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>

            </div>

        </div>

    </div>



    <!-- JavaScript-->
    <script src="{{ asset('sb_admin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/js/sb-admin-2.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    {{-- Script Sidebar --}}
    <script>
        document.getElementById('sidebarTogglee').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('toggled');
            document.getElementById('content-wrapper').classList.toggle('toggled');
        });
    </script>

    <!-- script Table Content -->
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                lengthMenu: [3, 6, 9, 12],

                "columnDefs": [{
                        "searchable": true,
                        "targets": [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    },
                    {
                        "orderable": true,
                        "targets": 1
                    },
                    {
                        "orderable": false,
                        "targets": 0
                    },
                    {
                        "orderable": false,
                        "targets": [2, 3, 4, 5, 6, 7, 8, 9, 10,
                            11
                        ]
                    }
                ],
                "language": {
                    "emptyTable": "",
                    "info": "",
                    "infoEmpty": "",
                    "infoFiltered": "",
                    "loadingRecords": "",
                    "processing": "",
                }
            });

            table.on('order.dt search.dt', function() {
                table.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });
    </script>
    <script>
        $(document).ready(function() {
            var catalogTable = $('#myTableCatalog').DataTable({
                lengthMenu: [3, 6, 9, 12],
                "columnDefs": [{
                        "searchable": true,
                        "targets": [1, 2, 3, 4, 5]
                    },
                    {
                        "orderable": true,
                        "targets": 1
                    },
                    {
                        "orderable": false,
                        "targets": [0, 2, 3, 4, 5]
                    }
                ],
                "language": {
                    "emptyTable": "",
                    "info": "",
                    "infoEmpty": "",
                    "infoFiltered": "",
                    "loadingRecords": "",
                    "processing": "",
                }
            });

            catalogTable.on('order.dt search.dt', function() {
                catalogTable.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            var panelTable = $('#myTablePanel').DataTable({
                lengthMenu: [3, 6, 9, 12],
                "columnDefs": [{
                        "searchable": true,
                        "targets": [1, 2, 3, 4]
                    },
                    {
                        "orderable": true,
                        "targets": 1
                    },
                    {
                        "orderable": false,
                        "targets": [0, 2, 3, 4]
                    }
                ],
                "language": {
                    "emptyTable": "",
                    "info": "",
                    "infoEmpty": "",
                    "infoFiltered": "",
                    "loadingRecords": "",
                    "processing": "",
                }
            });

            panelTable.on('order.dt search.dt', function() {
                panelTable.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });
    </script>

    {{-- Script CSRF --}}
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    <!-- script Form Status -->
    <script>
        $(document).ready(function() {
            $('select[name=status]').each(function() {
                var selectedOption = $(this).find('option:selected');
                var selectedColor = selectedOption.attr('class').replace('status-', '');
                $(this).css('color', selectedOption.css('color'));
            });

            $('select[name=status]').change(function() {
                var selectedOption = $(this).find('option:selected');
                $(this).css('color', selectedOption.css('color'));
            });
        });
    </script>

</body>

</html>

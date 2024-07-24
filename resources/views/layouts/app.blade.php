<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            z-index: 1000;
            background: #343a40;
            color: #fff;
            transition: all 0.3s;
            overflow-y: auto;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #23272b;
            border-bottom: 1px solid #495057;
        }

        #sidebar ul.components {
            padding: 0;
            list-style: none;
        }

        #sidebar ul.components p {
            color: #fff;
            padding: 10px 20px;
            font-weight: bold;
            border-bottom: 1px solid #495057;
            margin: 0;
        }

        #sidebar ul.components li {
            margin: 0;
        }

        #sidebar ul.components li a {
            padding: 10px 20px;
            font-size: 1em;
            display: block;
            color: #d1d1d1;
            transition: background 0.3s, color 0.3s;
            text-decoration: none;
        }

        #sidebar ul.components li a:hover {
            color: #ffffff;
            background: #495057;
        }

        #content {
            margin-left: 250px;
            transition: all 0.3s;
            padding: 20px;
        }

        #sidebarCollapse {
            position: absolute;
            top: 15px;
            left: 100%;
            transform: translateX(-100%);
            width: 50px;
            height: 50px;
            background: #343a40;
            color: #fff;
            border-radius: 5px;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
            transition: background 0.3s;
        }

        #sidebarCollapse:hover {
            background: #232931;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #content.active {
            margin-left: 0;
        }

        select[name=status] {
            width: 100px;
            padding: 5px;
            font-size: 16px;
        }

        /* form tabel index */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tr:hover {
            background-color: #ddd;
        }

    </style>


    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="p-4" id="sidebar">
        <div class="sidebar-header">
            <h3>Markotol</h3>
        </div>
        <ul class="list-unstyled components">
            <p>Main Menu</p>
            <li><a href="#">Home</a></li>
            <li><a href="/lokasi">Lokasi</a></li>
            <li><a href="/barang">Barang</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </div>

    <!-- Page Content -->
    <div id="content">
        <div class="container">

            <!-- Page Content -->
            @yield('content')
        </div>
    </div>



    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
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

    {{-- script form status --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

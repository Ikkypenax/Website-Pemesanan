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
    <style>
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 200px;
            z-index: 1000;
            background: #343a40;
            color: #fff;
            transition: all 0.3s;
            overflow-y: auto;
        }

        #content {
            margin-left: 200px;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -200px;
        }

        #content.active {
            margin-left: 0;
        }

        #sidebarCollapse {
            position: absolute;
            top: 0;
            right: -45px;
            width: 40px;
            height: 40px;
            background: #343a40;
            color: #fff;
            border-radius: 3px;
            text-align: center;
            line-height: 40px;
            cursor: pointer;
            transition: all 0.3s;
        }

        #sidebarCollapse:hover {
            background: #232931;
        }

        select[name=status] {
            width: 100px;
            padding: 5px;
            font-size: 16px;
        }

        /* Form */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .form-container .form-group {
            margin-bottom: 15px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container input,
        {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

        .form-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            appearance: none;
            background-color: #fff;
            background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" width="4" height="5" viewBox="0 0 4 5"><path fill="%23ccc" d="M2 0L0 2h4L2 0zm0 5L0 3h4l-2 2z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 10px 10px;
        }

        .form-container button {
            background-color: #26e03b;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 120px;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #17ac28;
        }

        /* Table */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 8px 12px;
            margin: 2px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            display: inline-block;
        }

        .btn-warning {
            background-color: #ffc107;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-success {
            background-color: #19d900;
            color: white;
        }

        .btn i {
            margin-right: 4px;
        }

    </style>

</head>

<body>
    

    <!-- Sidebar -->
    <div class="p-4" id="sidebar">
        <div class="sidebar-header">
            <h3>Dashboard</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Main Menu</p>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="/lokasi">Lokasi</a>
            </li>
            <li>
                <a href="/barang">Barang</a>
            </li>
            <li>
                <a href="/catalog">Catalog</a>
            </li>
        </ul>
    </div>

    <!-- Page Content -->
    <div id="content">

        <!-- Page Content -->
        <div class="container">
            @yield('content')
        </div>
    </div>

    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('active');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

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

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
            color: black;
        }

        .invoice-header {
            color: #000000;
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            color: #000000;
        }

        .header img {
            width: 250px;
            height: auto;
        }

        .one-section {
            text-align: center;
            padding: 2px;
        }

        .img-section {
            margin-bottom: 10px;
        }

        .company-logo {
            width: 320px;
            height: auto;
        }
    </style>
</head>

<body>


    <div class="one-section">
        <div class="img-section">
            <div class="">
                <img src="data:image/{{ $imageType }};base64,{{ $imageData }}" alt="Logo Sajiwa Mitra Sembada"
                    class="company-logo">
            </div>
        </div>
        <div class="text-section">
            <h3>Sajiwa Mitra Sembada</h3>
            <h4>Multimedia Solusi</h4>
            <p>Telp: 087839642255</p>
            <p>Email: sajiwamitrasembada@gmail.com</p>
        </div>
    </div>
<hr>


    <h2 class="invoice-header">Invoice #{{ $order->id }}</h2>
    <p>Tanggal: {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</p>

    <h2 class="invoice">Detail Pesanan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <td>{{ $order->name }}</td>
            </tr>
            <tr>
                <th>WA</th>
                <td>{{ $order->wa }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>{{ $order->panel->category }}</td>
            </tr>
            <tr>
                <th>Jenis</th>
                <td>{{ $order->panel->type }}</td>
            </tr>
            <tr>
                <th>Harga Per Meter</th>
                <td>Rp. {{ number_format($order->panel->price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Panjang x Lebar</th>
                <td>{{ $order->length }} x {{ $order->width }} Meter</td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>Rp. {{ number_format($order->result, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Biaya Transportasi</th>
                <td>Rp. {{ number_format($order->addfee->fee_transport, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Biaya Pemasangan</th>
                <td>Rp. {{ number_format($order->addfee->fee_install, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Biaya Jasa</th>
                <td>Rp. {{ number_format($order->addfee->fee_service, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Biaya Service</th>
                <td>Rp. {{ number_format($order->addfee->fee_repair, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Total Keseluruhan</th>
                <td>Rp. {{ number_format($order->addfee->fee_total, 0, ',', '.') }}</td>
            </tr>
        </thead>
    </table>

    <footer style="margin-top: 20px;">
        <p>Terima kasih telah bertransaksi dengan kami!</p>
    </footer>


</body>

</html>

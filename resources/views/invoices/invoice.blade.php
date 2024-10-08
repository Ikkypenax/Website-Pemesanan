<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        /* Gaya CSS seperti sebelumnya */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
            color: black;
        }
        .invoice-header {
            background: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .button-container {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <h1 class="invoice-header">Invoice #{{ $order->id }}</h1>
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
                <th>Total Keseluruhan</th>
                <td>Rp. {{ number_format($order->addfee->fee_total, 0, ',', '.') }}</td>
            </tr>
        </thead>
    </table>

    <footer style="margin-top: 20px;">
        <p>Terima kasih telah bertransaksi dengan kami!</p>
    </footer>

    <div class="button-container">
        <button onclick="window.print()">Cetak Invoice</button>
        <a href="{{ route('orders.downloadInvoice', $order->id) }}" class="btn btn-primary">Unduh Invoice</a>
    </div>

</body>
</html>

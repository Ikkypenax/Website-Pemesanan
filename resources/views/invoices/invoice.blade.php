<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        @page {
            size: A6;
            /* Mengatur ukuran halaman ke A6 */
            margin: 10mm;
            /* Memberikan margin standar pada halaman */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: black;
            width: 100%;
            /* Menyesuaikan konten dengan ukuran A6 */
            height: 100%;
            box-sizing: border-box;
            /* Untuk memastikan padding dihitung dalam ukuran total */
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .table {
            width: 95%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 5px;
            /* Padding kecil agar data tidak terlalu renggang */
            font-size: 12px;
            /* Menggunakan font kecil agar cukup pada A6 */
            text-align: left;
        }

        .table th {
            background-color: #f0f0f0;
        }

        .header img {
            width: 100%;
            /* Memastikan logo menyesuaikan lebar */
            height: auto;
        }

        .company-logo {
            width: 150px;
            height: auto;
        }

        .company-info {
            text-align: center;
            margin-bottom: 10px;
        }

        .company-info h3,
        .company-info h4 {
            margin: 2px 0;
            font-size: 14px;
        }

        .company-info p {
            margin: 2px 0;
            font-size: 12px;
        }

        .invoice-info {
            font-size: 12px;
            margin-top: 10px;
        }

        footer {
            margin-top: 10px;
            font-size: 12px;
            text-align: center;
        }

        hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 10px 0;
        }
    </style>
</head>

<body>

    <div class="company-info">
        <div class="img-section">
            <img src="data:image/{{ $imageType }};base64,{{ $imageData }}" alt="Logo Sajiwa Mitra Sembada"
                class="company-logo">
        </div>
        <h3>Sajiwa Mitra Sembada</h3>
        <h4>Multimedia Solusi</h4>
        <p>Telp: 087839642255</p>
        <p>Email: sajiwamitrasembada@gmail.com</p>
    </div>

    <hr>

    <div class="invoice-header">
        <h2 style="margin-bottom: 2px; margin-top: 2px">Invoice #{{ $order->id }}</h2>
    </div>

    <div class="invoice-info">
        <p style="margin-top: 8px; margin-bottom: 14px;">Tanggal:
            {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</p>
    </div>

    <h2 style="font-size: 14px; margin-bottom: 5px;">Detail Pesanan</h2>

    {{-- <table class="table">
        <tbody>
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
                <th>Biaya Transportasi</th>
                <td>Rp. {{ number_format($order->addfee->fee_transport, 0, ',', '.') }}</td>
            </tr>
            <tr>
                
                <th>Harga Barang</th>
                <td>Rp. {{ number_format($order->result, 0, ',', '.') }}</td>
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
        </tbody>
    </table> --}}

    <table class="table">
        <thead>

        </thead>
        <tbody>
            <tr>
                <th>Nama</th>
                <th colspan="3">{{ $order->name }}</th>
            </tr>
            <tr>
                <td>No Hp</td>
                <td>{{ $order->wa }}</td>
                <td>Harga Panel</td>
                <td>Rp.{{ number_format($order->result, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>{{ $order->panel->category }}</td>
                <td>Biaya Transportasi</td>
                <td>Rp.{{ number_format($order->addfee->fee_transport, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Jenis Panel</td>
                <td>{{ $order->panel->type }}</td>
                <td>Biaya Pemasangan</td>
                <td>Rp.{{ number_format($order->addfee->fee_install, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Harga Per Meter</td>
                <td>Rp.{{ number_format($order->panel->price, 0, ',', '.') }}</td>
                <td>Biaya Jasa</td>
                <td>Rp.{{ number_format($order->addfee->fee_service, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Ukuran</td>
                <td>{{ $order->length }} x {{ $order->width }} Meter</td>
                <td>Biaya Service</td>
                <td>Rp.{{ number_format($order->addfee->fee_repair, 0, ',', '.') }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Biaya Keseluruhan</td>
                <td>Rp.{{ number_format($order->addfee->fee_total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>


    <footer>
        <p>Terima kasih telah bertransaksi dengan kami!</p>
    </footer>

</body>

</html>

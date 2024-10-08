<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        /* Atur style untuk tampilan PDF */
        body {
            font-family: Arial, sans-serif;
        }

        header {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        .right {
            text-align: right;
        }

        /* Atur header dengan table untuk kompatibilitas PDF */
        .company-info {
            text-align: left;
            width: 50%;
        }

        .company-logo {
            width: 100px;
            float: left;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <header>
        <table>
            <tr>
                <td class="company-info">
                    {{-- <img src="{{ asset('assets/images/Marco.png') }}" alt="Logo Sajiwa Mitra Sembada" class="company-logo"> --}}
                    <div>
                        <h2>Sajiwa Mitra Sembada</h2>
                        <p>Multimedia Solusi</p>
                        <p>Jl. Laksda Adisucipto km.6 no.26 Bantulan, Depok Sleman, Yogyakarta</p>
                        <p>Telp: 087839642255</p>
                        <p>Email: sajiwamitrasembada@gmail.com</p>
                    </div>
                </td>
            </tr>
        </table>
    </header>

    <h2 style="text-align: center;">INVOICE</h2>
    <p style="text-align: center;">Nomor Invoice: {{ $order->id }}</p>

    <div style="margin-top: 20px;">
        <p>Nama: {{ $order->name }}</p>
        <p>No Telp: {{ $order->wa }}</p>
        <p>Alamat: {{ $order->provinces->name }}, {{ $order->regency }}</p>
    </div>

    <table border="1" cellspacing="0" cellpadding="5" style="width: 100%; margin-top: 20px; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Jenis Barang</th>
                <th>Harga Per Meter</th>
                <th>Panjang x Lebar</th>
                <th>Biaya Transportasi</th>
                <th>Biaya Pemasangan</th>
                <th>Biaya Jasa</th>
                <th>Biaya Service</th>
                <th>Total Biaya Keseluruhan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->panel->category }}</td>
                <td>{{ $order->panel->type }}</td>
                <td class="right">{{ 'Rp. ' . number_format($order->panel->price, 0, ',', '.') }}</td>
                <td>{{ $order->length }} x {{ $order->width }} Meter</td>
                <td class="right">{{ 'Rp. ' . number_format($order->addfee->fee_transport, 0, ',', '.') }}</td>
                <td class="right">{{ 'Rp. ' . number_format($order->addfee->fee_install, 0, ',', '.') }}</td>
                <td class="right">{{ 'Rp. ' . number_format($order->addfee->fee_service, 0, ',', '.') }}</td>
                <td class="right">{{ 'Rp. ' . number_format($order->addfee->fee_repair, 0, ',', '.') }}</td>
                <td class="right">{{ 'Rp. ' . number_format($order->addfee->fee_total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>

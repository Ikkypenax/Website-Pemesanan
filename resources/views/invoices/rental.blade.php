<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $rent->id }}</title>
    <style>
        @page {
            size: A6;
            margin: 10mm;

        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: black;
            width: 100%;
            height: 100%;
            box-sizing: border-box;

        }

        .invoice-header {
            text-align: center;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin: 0 auto;
            table-layout: fixed;

        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 5px;
            font-size: 11px;
            text-align: left;
            word-wrap: break-word;

        }


        .table th {
            background-color: #f0f0f0;
        }

        .header img {
            width: 100%;
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

    {{-- Invoice Tampilan dalam PDF --}}
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
        <h2 style="margin-bottom: 16px; margin-top: 8px">Invoice #{{ $rent->rent_code }}</h2>
    </div>

    <h2 style="font-size: 14px; margin-bottom: 5px; margin-top: 10px;">Penyewaan Videotron</h2>

    <div class="invoice-info">
        <p style="margin-top: 8px; margin-bottom: 16px; font-size: 14px;">Tanggal:
            {{ \Carbon\Carbon::parse($rent->created_at)->format('d-m-Y') }}</p>
    </div>


    {{-- Tabel Informasi Penyewaan (Tabel Pertama) --}}
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th colspan="4" class="text-center" style="font-size: 14px;">Informasi Sewa</th>
            </tr>
            <tr>
                <th colspan="1" class="text-center" style="font-size: 10px;">Tanggal Sewa</th>
                <th colspan="3" class="text-center" style="font-size: 10px;">
                    {{ \Carbon\Carbon::parse($rent->tgl_sewa)->format('d-m-Y') }} s/d
                    {{ \Carbon\Carbon::parse($rent->tgl_selesai)->format('d-m-Y') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="width: 25%;">Nama</th>
                <td>{{ $rent->nama }}</td>
                <th style="width: 25%;">Waktu Sewa</th>
                <td>{{ \Carbon\Carbon::parse($rent->mulai)->format('H:i') }} s/d
                    {{ \Carbon\Carbon::parse($rent->selesai)->format('H:i') }}</td>
            </tr>
            <tr>
                <th>No Hp</th>
                <td>{{ $rent->wa }}</td>
                <th>Kategori</th>
                <td>{{ $rent->panel->category }}</td>
            </tr>
            <tr>
                <th>Jenis Panel</th>
                <td>{{ $rent->panel->type }}</td>
                <th>Ukuran</th>
                <td>{{ intval($rent->panjang ?? 0) }} x {{ intval($rent->lebar ?? 0) }} Meter</td>
            </tr>
            <tr>
                <th>Harga Per Meter</th>
                <td>Rp. {{ number_format($rent->panel->rental, 0, ',', '.') }}</td>
                <th>Harga Sewa</th>
                <td>Rp. {{ number_format($rent->total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    {{-- Tabel Biaya (Tabel Kedua) --}}
    <table class="table table-striped table-bordered ">
        <thead>
            <tr>
                <th colspan="4" class="text-center" style="font-size: 14px;">Biaya Tambahan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="width: 25%;">Biaya Transportasi</th>
                <td>Rp. {{ number_format($rent->feerent->fee_transport, 0, ',', '.') }}</td>
                <th>Biaya Pemasangan</th>
                <td>Rp. {{ number_format($rent->feerent->fee_install, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Biaya Jasa</th>
                <td>Rp. {{ number_format($rent->feerent->fee_service, 0, ',', '.') }}</td>
                <th>Biaya Service</th>
                <td>Rp. {{ number_format($rent->feerent->fee_repair, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Biaya Pendukung</th>
                <td>Rp. {{ number_format($rent->feerent->fee_support, 0, ',', '.') }}</td>
                <th>Biaya Keseluruhan</th>
                <td>Rp. {{ number_format($rent->feerent->fee_total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-striped table-bordered ">
        <thead>
            <tr>
                <th colspan="4" class="text-center" style="font-size: 14px;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="4">{{ $rent->keterangan }}</td>
            </tr>

        </tbody>
    </table>




    <footer>
        <p>Terima kasih telah bertransaksi dengan kami!</p>
    </footer>

</body>

</html>

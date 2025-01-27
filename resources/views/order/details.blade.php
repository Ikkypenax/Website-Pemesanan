@extends('layouts.layouts')

@section('title', 'Detail Pesanan')

@section('content')

    {{-- <div class="container" style="margin-top: 100px; margin-bottom: 110px;">
        <h1>Pesanan</h1>
        <p>Halo, <strong> {{ $user->name }} </strong>! Berikut adalah daftar pesanan Anda:</p>

        @if ($orders->isEmpty())
            <p>Anda belum memiliki pesanan.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pesanan</th>
                        <th>Nama</th>
                        <th>WA</th>
                        <th>Kabupaten</th>
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>PDF</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->order_code }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->wa }}</td>
                            <td>{{ $order->regency }}</td>
                            <td>{{ $order->length }}</td>
                            <td>{{ $order->width }}</td>
                            <td>Rp {{ number_format($order->result, 0, ',', '.') }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                @if ($order->status === 'Approve')
                                    <p>*Total belum termasuk biaya tambahan</p>
                                    <a class="btn btn-warning" href="{{ route('orders.printInvoice', $order->id) }}">
                                        <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                                    </a>
                                @elseif ($order->status === 'Finish')
                                    <p>Pesanan telah selesai</p>
                                @else
                                    <p>Nota pesanan bisa di unduh setelah disetujui</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div> --}}


    {{-- <div class="container" style="padding-top: 100px; padding-bottom:100px ;">
        @if ($order)
            <h1>Detail Pemesanan</h1>
            <div class="alert alert-info">
                <strong>Hai {{ $order->name }},</strong> Kode Pemesanan anda <b>{{ $order->order_code }}</b> telah terdata,
                harap untuk segera melakukan penyelesaian ya.
            </div>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><b>Nama</b></td>
                        <td>{{ $order->name }}</td>
                    </tr>
                    <tr>
                        <td><b>WA</b></td>
                        <td>{{ $order->wa }}</td>
                    </tr>
                    <tr>
                        <td><b>Provinsi</b></td>
                        <td>{{ $order->provinces->name ?? 'Tidak ada' }}</td>
                    </tr>
                    <tr>
                        <td><b>Kabupaten</b></td>
                        <td>{{ $order->regency ?? 'Tidak ada' }}</td>
                    </tr>
                    <tr>
                        <td><b>Total</b></td>
                        <td>
                            @if (optional($order->addfee)->fee_total !== null)
                                Rp. {{ number_format($order->addfee->fee_total, 0, ',', '.') }}
                            @else
                                Belum disetujui
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><b>Status</b></td>
                        <td>{{ $order->status }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-3">
                @if (in_array($order->status, ['Approve', 'Finish']))
                    <p>*Total belum termasuk biaya tambahan</p>
                    <a class="btn btn-warning" href="{{ route('orders.printInvoice', $order->id) }}">
                        <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                    </a>
                @else
                    <p>*Nota pesanan bisa di unduh setelah disetujui</p>
                @endif
            </div>
        @elseif ($rent)
            <h1>Detail Sewa</h1>
            <div class="alert alert-info">
                <strong>Hai {{ $rent->nama }},</strong> Kode Pemesanan anda <b>{{ $rent->rent_code }}</b> telah terdata,
                harap untuk segera melakukan penyelesaian ya.
            </div>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><b>Nama</b></td>
                        <td>{{ $rent->nama }}</td>
                        <td><b>Tgl Mulai</b></td>
                        <td>{{ $rent->tgl_sewa }}</td>
                    </tr>
                    <tr>
                        <td><b>WA</b></td>
                        <td>{{ $rent->wa }}</td>
                        <td><b>Tgl Selesai</b></td>
                        <td>{{ $rent->tgl_selesai }}</td>
                    </tr>
                    <tr>
                        <td><b>Provinsi</b></td>
                        <td>{{ $rent->provinces->name ?? 'Tidak ada' }}</td>
                        <td><b>Waktu Mulai</b></td>
                        <td>{{ $rent->mulai }}</td>
                    </tr>
                    <tr>
                        <td><b>Kabupaten</b></td>
                        <td>{{ $rent->kabupaten ?? 'Tidak ada' }}</td>
                        <td><b>Waktu Selesai</b></td>
                        <td>{{ $rent->selesai }}</td>
                    </tr>
                    <tr>
                        <td><b>Total</b></td>
                        <td>
                            @if (optional($rent->feerent)->fee_total !== null)
                                Rp. {{ number_format($rent->feerent->fee_total, 0, ',', '.') }}
                            @else
                                Belum disetujui
                            @endif
                        </td>
                        <td><b>Status</b></td>
                        <td>{{ $rent->status }}</td>
                    </tr>
                    <tr>

                    </tr>
                </tbody>
            </table>
            <div class="mt-3">
                @if (in_array($rent->status, ['Approve', 'Finish']))
                    <p>*Total belum termasuk biaya tambahan</p>
                    <a class="btn btn-warning" href="{{ route('rent.printInvoice', $rent->id) }}">
                        <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                    </a>
                @else
                    <p>*Nota pesanan bisa di unduh setelah disetujui</p>
                @endif
            </div>
        @endif
    </div> --}}


    <div class="container" style="padding-top: 100px; padding-bottom: 100px;">
        <h1>Detail {{ $type === 'rent' ? 'Sewa' : 'Pemesanan' }}</h1>
        <div class="alert alert-info">
            <strong>Hai {{ $type === 'rent' ? $data->nama : $data->name }},</strong>
            Kode {{ $type === 'rent' ? 'Sewa' : 'Pemesanan' }} Anda
            <b>{{ $type === 'rent' ? $data->rent_code : $data->order_code }}</b> telah terdata,
            harap untuk segera melakukan penyelesaian ya.
        </div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><b>Nama</b></td>
                    <td>{{ $type === 'rent' ? $data->nama : $data->name }}</td>
                    @if ($type === 'rent')
                        <td><b>Tgl Mulai</b></td>
                        <td>{{ $data->tgl_sewa }}</td>
                    @endif
                </tr>
                <tr>
                    <td><b>WA</b></td>
                    <td>{{ $data->wa }}</td>
                    @if ($type === 'rent')
                        <td><b>Tgl Selesai</b></td>
                        <td>{{ $data->tgl_selesai }}</td>
                    @endif
                </tr>
                <tr>
                    <td><b>Provinsi</b></td>
                    <td>{{ $data->provinces->name ?? 'Tidak ada' }}</td>
                    @if ($type === 'rent')
                        <td><b>Waktu Mulai</b></td>
                        <td>{{ $data->mulai }}</td>
                    @endif
                </tr>
                <tr>
                    <td><b>Kabupaten</b></td>
                    <td>{{ $data->kabupaten ?? ($data->regency ?? 'Tidak ada') }}</td>
                    @if ($type === 'rent')
                        <td><b>Waktu Selesai</b></td>
                        <td>{{ $data->selesai }}</td>
                    @endif
                </tr>
                <tr>
                    <td><b>Total</b></td>
                    <td>
                        @if (optional($type === 'rent' ? $data->feerent : $data->addfee)->fee_total !== null)
                            Rp.
                            {{ number_format(optional($type === 'rent' ? $data->feerent : $data->addfee)->fee_total, 0, ',', '.') }}
                        @else
                            Belum disetujui
                        @endif
                    </td>
                    @if ($type === 'rent')
                        <td><b>Status</b></td>
                        <td>{{ $data->status }}</td>
                </tr>
            @else
                <tr>
                    <td><b>Status</b></td>
                    <td>{{ $data->status }}</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="mt-3">
            @if (in_array($data->status, ['Approve', 'Finish']))
                <p>*Total belum termasuk biaya tambahan</p>
                <a class="btn btn-warning"
                    href="{{ route($type === 'rent' ? 'rent.printInvoice' : 'orders.printInvoice', $data->id) }}">
                    <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                </a>
            @else
                <p>*Nota pesanan bisa diunduh setelah disetujui</p>
            @endif
        </div>
    </div>


@endsection

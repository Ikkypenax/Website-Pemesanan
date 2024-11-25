@extends('layouts.layouts')

@section('title', 'Detail Pesanan')

@section('content')

    <div class="container" style="margin-top: 100px; margin-bottom: 110px;">
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
    </div>


    {{-- <div class="container" style="padding-top: 100px; padding-bottom:100px ;">
        <h1>Detail Pesanan</h1>

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
                    <td>Rp. {{ number_format($order->result, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td><b>Status</b></td>
                    <td>{{ $order->status }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-3">
            @if ($order->status === 'Approve')
                <p>*Total belum termasuk biaya tambahan</p>
                <a class="btn btn-warning" href="{{ route('orders.printInvoice', $order->id) }}">
                    <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                </a>
            @else
                <p>*Nota pesanan bisa di unduh setelah disetujui</p>
            @endif
        </div>
    </div> --}}
@endsection

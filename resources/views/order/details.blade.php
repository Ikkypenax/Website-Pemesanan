@extends('layouts.layouts')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container" style="padding-top: 100px; padding-bottom:100px ;">
    <h1>Detail Pesanan</h1>

    <div class="alert alert-info">
        <strong>Hai {{ $order->name }},</strong> Kode Pemesanan anda <b>{{ $order->order_code }}</b> telah terdata, harap untuk segera melakukan penyelesaian ya.
    </div>

    {{-- Tabel Informasi Pesanan --}}
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
                <td>{{ ($order->provinces)->name ?? 'Tidak ada' }}</td>
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

    <!-- Btn Invoice -->
    <div class="mt-3">
        @if($order->status === 'Approve')
            <a class="btn btn-warning" href="{{ route('orders.printInvoice', $order->id) }}">
                <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
            </a>
        @else
            <p>*Nota pesanan bisa di unduh setelah disetujui</p>
        @endif
    </div>
</div>
@endsection

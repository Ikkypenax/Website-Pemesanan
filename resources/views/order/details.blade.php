@extends('layouts.layouts')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container" style="padding-top: 100px; padding-bottom:100px ;">
    <h1>Detail Pesanan</h1>

    <div class="alert alert-info">
        <strong>Hai {{ $order->name }},</strong> Kode Pemesanan anda <b>{{ $order->order_code }}< telah terdata, harap untuk segera melakukan penyelesaian ya.
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
                <td>{{ optional($order->provinces)->name ?? 'Tidak ada' }}</td> <!-- Ganti dengan nama provinsi sesuai data -->
            </tr>
            <tr>
                <td><b>Kabupaten</b></td>
                <td>{{ optional($order->regency)->name ?? 'Tidak ada' }}</td> <!-- Ganti dengan nama kabupaten sesuai data -->
            </tr>
            <tr>
                <td><b>Total</b></td>
                <td>{{ $order->result }}</td>
            </tr>
            <tr>
                <td><b>Status</b></td>
                <td>{{ $order->status }}</td>
            </tr>
        </tbody>
    </table>


</div>
@endsection


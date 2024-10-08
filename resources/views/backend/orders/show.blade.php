@extends('layouts.app')

@section('title', 'Detail')

@section('content')
    <div class="container mt-3">

        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center py-3">
                <div class="pull-right" style="margin-right: 16px">
                    <a class="btn btn-primary" href="{{ route('orders.index') }}">
                        <i class="bi bi-arrow-left-square"></i>
                    </a>
                </div>
                <h3 class="m-0 font-weight-bold text-primary">Detail Pesanan</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">


                    <div class="table-container gap-0">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <td>{{ $order->panel ? 'Rp. ' . number_format($order->panel->price, 0, ',', '.') : 'Rp. 0' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Panjang x Lebar</th>
                                    <td>{{ $order->length }} x {{ $order->width }} Meter</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>{{ $order->result ? 'Rp. ' . number_format($order->result, 0, ',', '.') : 'Rp. 0' }}
                                    </td>
                                </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th>Provinsi</th>
                                <td>{{ $order->provinces->name }}</td>
                            </tr>
                            <tr>
                                <th>Kabupaten</th>
                                <td>{{ $order->regency }}</td>
                            </tr>
                            <tr>
                                <th>Transportasi</th>
                                <td>
                                    @isset($order->addfee->fee_transport)
                                        Rp. {{ number_format($order->addfee->fee_transport, 0, ',', '.') }}
                                    @else
                                        -
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <th>Pemasangan</th>
                                <td>
                                    @isset($order->addfee->fee_install)
                                        Rp. {{ number_format($order->addfee->fee_install, 0, ',', '.') }}
                                    @else
                                        -
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <th>Jasa</th>
                                <td>
                                    @isset($order->addfee->fee_service)
                                        Rp. {{ number_format($order->addfee->fee_service, 0, ',', '.') }}
                                    @else
                                        -
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <th>Service</th>
                                <td>
                                    @isset($order->addfee->fee_repair)
                                        Rp. {{ number_format($order->addfee->fee_repair, 0, ',', '.') }}
                                    @else
                                        -
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <th>Total Keseluruhan</th>
                                <td>
                                    @isset($order->addfee->fee_total)
                                        Rp. {{ number_format($order->addfee->fee_total, 0, ',', '.') }}
                                    @else
                                        -
                                    @endisset
                                </td>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div>
                        <a class="btn btn-success" href="{{ route('orders.sendInvoice', $order->id) }}">
                            <i class="bi bi-whatsapp"></i> Kirim Invoice ke WhatsApp
                        </a>
                    </div>
                    <div>
                        <a class="btn btn-danger" href="{{ route('orders.showInvoice', $order->id) }}">
                            <i class="bi bi-book"></i> PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.app')

@section('title', 'Detail')

@section('content')
    <div class="container mt-3">

        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center py-3">
                <div class="pull-right" style="margin-right: 16px">
                    <a class="btn btn-primary" href="{{ route('pesanan.index') }}">
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
                                    <td>{{ $lokasi->nama }}</td>
                                </tr>
                                <tr>
                                    <th>WA</th>
                                    <td>{{ $lokasi->wa }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $lokasi->kategori }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis</th>
                                    <td>{{ $lokasi->jenis }}</td>
                                </tr>
                                <tr>
                                    <th>Harga Per Meter</th>
                                    <td>{{ $lokasi->hargaPerMeter ? 'Rp. ' . number_format($lokasi->hargaPerMeter->harga, 0, ',', '.') : 'Rp. 0' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Panjang x Lebar</th>
                                    <td>{{ $lokasi->panjang }} x {{ $lokasi->lebar }} Meter</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>{{ $lokasi->result ? 'Rp. ' . number_format($lokasi->result, 0, ',', '.') : 'Rp. 0' }}
                                    </td>
                                </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th>Provinsi</th>
                                <td>{{ $lokasi->provinsi }}</td>
                            </tr>
                            <tr>
                                <th>Kabupaten</th>
                                <td>{{ $lokasi->kabupaten }}</td>
                            </tr>
                            <tr>
                                <th>Transportasi</th>
                                <td>
                                    @isset($lokasi->addfee->biaya_transportasi)
                                        Rp. {{ number_format($lokasi->addfee->biaya_transportasi, 0, ',', '.') }}
                                    @else
                                        -
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <th>Pemasangan</th>
                                <td>
                                    @isset($lokasi->addfee->biaya_pemasangan)
                                        Rp. {{ number_format($lokasi->addfee->biaya_pemasangan, 0, ',', '.') }}
                                    @else
                                        -
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <th>Jasa</th>
                                <td>
                                    @isset($lokasi->addfee->biaya_jasa)
                                        Rp. {{ number_format($lokasi->addfee->biaya_jasa, 0, ',', '.') }}
                                    @else
                                        -
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <th>Service</th>
                                <td>
                                    @isset($lokasi->addfee->biaya_service)
                                        Rp. {{ number_format($lokasi->addfee->biaya_service, 0, ',', '.') }}
                                    @else
                                        -
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <th>Total Keseluruhan</th>
                                <td>
                                    @isset($lokasi->addfee->total_biaya)
                                        Rp. {{ number_format($lokasi->addfee->total_biaya, 0, ',', '.') }}
                                    @else
                                        -
                                    @endisset
                                </td>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div>
                        <a class="btn btn-success" href="{{ route('lokasi.sendInvoice', $lokasi->id) }}">
                            <i class="bi bi-whatsapp"></i> Kirim Invoice ke WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

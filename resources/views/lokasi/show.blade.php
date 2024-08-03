@extends('layouts.app')

@section('title', 'Detail')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left w-100 d-flex justify-content-between">
                    <div>
                        <div class="d-flex mb-3">
                            <div class="pull-right" style="margin-right: 16px">
                                <a class="btn btn-primary" href="{{ route('lokasi.index') }}">
                                    <i class="bi bi-arrow-left-square"></i>
                                </a>
                            </div>
                            <h2>Edit Lokasi</h2>
                        </div>
                    </div>

                    <div>

                    </div>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <table class="table table-bordered">
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
                        <td>{{ $lokasi->result ? 'Rp. ' . number_format($lokasi->result, 0, ',', '.') : 'Rp. 0' }}</td>
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
                        @isset($lokasi->tambahRp->biaya_transportasi)
                            Rp. {{ number_format($lokasi->tambahRp->biaya_transportasi, 0, ',', '.') }}
                        @else
                            -
                        @endisset
                    </td>
                </tr>
                <tr>
                    <th>Pemasangan</th>
                    <td>
                        @isset($lokasi->tambahRp->biaya_pemasangan)
                            Rp. {{ number_format($lokasi->tambahRp->biaya_pemasangan, 0, ',', '.') }}
                        @else
                            -
                        @endisset
                    </td>
                </tr>
                <tr>
                    <th>Jasa</th>
                    <td>
                        @isset($lokasi->tambahRp->biaya_jasa)
                            Rp. {{ number_format($lokasi->tambahRp->biaya_jasa, 0, ',', '.') }}
                        @else
                            -
                        @endisset
                    </td>
                </tr>
                <tr>
                    <th>Service</th>
                    <td>
                        @isset($lokasi->tambahRp->biaya_service)
                            Rp. {{ number_format($lokasi->tambahRp->biaya_service, 0, ',', '.') }}
                        @else
                            -
                        @endisset
                    </td>
                </tr>
                <tr>
                    <th>Total Keseluruhan</th>
                    <td>
                        @isset($lokasi->tambahRp->total_biaya)
                            Rp. {{ number_format($lokasi->tambahRp->total_biaya, 0, ',', '.') }}
                        @else
                            -
                        @endisset
                    </td>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

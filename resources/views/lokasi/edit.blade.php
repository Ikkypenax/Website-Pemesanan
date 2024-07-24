@extends('layouts.app')

@section('title', 'Edit Lokasi')

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rincian biaya lain</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('biaya.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="transportasi">Biaya Transportasi:</label>
                            <input class="form-control" type="number" name="transportasi" id="transportasi">
                        </div>
                        <div>
                            <label for="pemasangan">Biaya Pemasangan:</label>
                            <input class="form-control" type="number" name="pemasangan" id="pemasangan">
                        </div>
                        <div>
                            <label for="jasa">Biaya Jasa:</label>
                            <input class="form-control" type="number" name="jasa" id="jasa">
                        </div>
                        <div>
                            <label for="service">Biaya Service:</label>
                            <input class="form-control" type="number" name="service" id="service">
                        </div>
                        <div>
                            <input type="hidden" name="lokasi_id" value="{{ $lokasi->id }}" id="lokasi_id">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="w-100 btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Tabel pesanan --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left w-100 d-flex justify-content-between">
                    <div>
                        <div class="d-flex">
                            <div class="pull-right">
                                <a class="btn" href="{{ route('lokasi.index') }}"><b>
                                        <<< </a>
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
                    <tr>
                        <td colspan="2">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                + Biaya Lain
                            </button>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

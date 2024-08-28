@extends('layouts.app')

@section('title', 'Edit Pesanan')

@section('content')


    {{-- Tabel pesanan --}}
    <div class="container mt-3">

        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center py-3">
                <div class="pull-right" style="margin-right: 16px">
                    <a class="btn btn-primary" href="{{ route('orders.index') }}">
                        <i class="bi bi-arrow-left-square"></i>
                    </a>
                </div>
                <h3 class="m-0 font-weight-bold text-primary">Edit Pesanan</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">


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


                    <div class="table-container-edit">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $lokasi->name }}</td>
                                </tr>
                                <tr>
                                    <th>WA</th>
                                    <td>{{ $lokasi->wa }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $lokasi->panel->category }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis</th>
                                    <td>{{ $lokasi->panel->type }}</td>
                                </tr>
                                <tr>
                                    <th>Harga Per Meter</th>
                                    <td>{{ $lokasi->panel ? 'Rp. ' . number_format($lokasi->panel->price, 0, ',', '.') : 'Rp. 0' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Panjang x Lebar</th>
                                    <td>{{ intval($lokasi->length) }} x {{ intval($lokasi->width) }} Meter</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>{{ $lokasi->result ? 'Rp. ' . number_format($lokasi->result, 0, ',', '.') : 'Rp. 0' }}
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Provinsi</th>
                                    <td>{{ $lokasi->provinces->name }}</td>
                                </tr>
                                <tr>
                                    <th>Kabupaten</th>
                                    <td>{{ $lokasi->regency }}</td>
                                </tr>
                                
                                <tr>
                                    <th>Transportasi</th>
                                    <td>
                                        @isset($lokasi->addfee->fee_transport)
                                            Rp. {{ number_format($lokasi->addfee->fee_transport, 0, ',', '.') }}
                                        @else
                                            -
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pemasangan</th>
                                    <td>
                                        @isset($lokasi->addfee->fee_install)
                                            Rp. {{ number_format($lokasi->addfee->fee_install, 0, ',', '.') }}
                                        @else
                                            -
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jasa</th>
                                    <td>
                                        @isset($lokasi->addfee->fee_service)
                                            Rp. {{ number_format($lokasi->addfee->fee_service, 0, ',', '.') }}
                                        @else
                                            -
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <th>Service</th>
                                    <td>
                                        @isset($lokasi->addfee->fee_repair)
                                            Rp. {{ number_format($lokasi->addfee->fee_repair, 0, ',', '.') }}
                                        @else
                                            -
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Keseluruhan</th>
                                    <td>
                                        @isset($lokasi->addfee->fee_total)
                                            Rp. {{ number_format($lokasi->addfee->fee_total, 0, ',', '.') }}
                                        @else
                                            -
                                        @endisset
                                    </td>
                                </tr>
                            </thead>
                        </table>


                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="2">

                                @if ($lokasi->addfee === null)
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        + Tambah Biaya
                                    </button>
                                @else
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2">
                                        + Edit Biaya
                                    </button>
                                @endif

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- + Tambah Biaya-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('biaya.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="transport">Biaya Transportasi:</label>
                            <input class="form-control" type="number" name="transport" id="transport">
                        </div>
                        <div>
                            <label for="install">Biaya Pemasangan:</label>
                            <input class="form-control" type="number" name="install" id="install">
                        </div>
                        <div>
                            <label for="service">Biaya Jasa:</label>
                            <input class="form-control" type="number" name="service" id="service">
                        </div>
                        <div>
                            <label for="repair">Biaya Service:</label>
                            <input class="form-control" type="number" name="repair" id="repair">
                        </div>
                        <div>
                            <input type="hidden" name="order_id" value="{{ $lokasi->id }}" id="order_id">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="w-100 btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- + Edit Biaya -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2">Edit Biaya</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('biaya.update', $lokasi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="transport">Biaya Transportasi:</label>
                            <input class="form-control" type="text" name="transport" id="transport"
                             value="{{ intval($lokasi->addfee->fee_transport ?? 0)  }}">
                        </div>
                        <div>
                            <label for="install">Biaya Pemasangan:</label>
                            <input class="form-control" type="text" name="install" id="install"
                             value="{{ intval($lokasi->addfee->fee_install ?? 0) }}">
                        </div>
                        <div>
                            <label for="service">Biaya Jasa:</label>
                            <input class="form-control" type="text" name="service" id="service"
                             value="{{ intval($lokasi->addfee->fee_service ?? 0) }}">
                        </div>
                        <div>
                            <label for="repair">Biaya Service:</label>
                            <input class="form-control" type="text" name="repair" id="repair"
                             value="{{ intval($lokasi->addfee->fee_repair ?? 0) }}">
                        </div>
                        <div>
                            <input type="hidden" name="fee_total" value="" id="fee_total">
                        </div>
                        <div>
                            <input type="hidden" name="order_id" value="{{ $lokasi->id }}" id="order_id">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="w-100 btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

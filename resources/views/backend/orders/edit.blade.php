@extends('layouts.app')

@section('title', 'Edit Pesanan')

@section('content')


    <div class="container mt-3">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

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

                    {{-- Tabel Edit Pesanan --}}
                    <div class="table-container-edit">
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
                                    <td>{{ intval($order->length) }} x {{ intval($order->width) }} Meter</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>{{ $order->result ? 'Rp. ' . number_format($order->result, 0, ',', '.') : 'Rp. 0' }}
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-bordered">
                            <thead>
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
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="2">

                                @if ($order->addfee === null)
                                    <button type="button" class="mt-1 pt-1 btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        + Tambah Biaya
                                    </button>
                                @else
                                    <button type="button" class="mt-1 pt-1 btn btn-warning" data-bs-toggle="modal"
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



    <!-- Modal Tambah Biaya-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Biaya</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fee.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="transport">Biaya Transportasi:</label>
                            <input class="form-control" type="number" name="transport" id="transport" required>
                        </div>
                        <div>
                            <label for="install">Biaya Pemasangan:</label>
                            <input class="form-control" type="number" name="install" id="install" required>
                        </div>
                        <div>
                            <label for="service">Biaya Jasa:</label>
                            <input class="form-control" type="number" name="service" id="service" required>
                        </div>
                        <div>
                            <label for="repair">Biaya Service:</label>
                            <input class="form-control" type="number" name="repair" id="repair" required>
                        </div>
                        <div>
                            <input type="hidden" name="order_id" value="{{ $order->id }}" id="order_id">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="w-100 btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Edit Biaya -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2">Edit Biaya</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fee.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="transport">Biaya Transportasi:</label>
                            <input class="form-control" type="number" name="transport" id="transport" required
                                value="{{ intval($order->addfee->fee_transport ?? 0) }}" >
                        </div>
                        <div>
                            <label for="install">Biaya Pemasangan:</label>
                            <input class="form-control" type="number" name="install" id="install" required
                                value="{{ intval($order->addfee->fee_install ?? 0) }}" >
                        </div>
                        <div>
                            <label for="service">Biaya Jasa:</label>
                            <input class="form-control" type="number" name="service" id="service" required
                                value="{{ intval($order->addfee->fee_service ?? 0) }}" >
                        </div>
                        <div>
                            <label for="repair">Biaya Service:</label>
                            <input class="form-control" type="number" name="repair" id="repair" required
                                value="{{ intval($order->addfee->fee_repair ?? 0) }}" >
                        </div>
                        <div>
                            <input type="hidden" name="fee_total" value="" id="fee_total">
                        </div>
                        <div>
                            <input type="hidden" name="order_id" value="{{ $order->id }}" id="order_id">
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

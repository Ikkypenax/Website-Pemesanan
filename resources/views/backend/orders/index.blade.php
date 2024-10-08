@extends('layouts.app')

@section('title', 'List Pesanan')

@section('content')
    <div class="container-fluid">

        <!-- Success Message -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3 mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h3>
                {{-- <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('orders.create') }}">
                    <i class="bi bi-plus fa-sm text-white-50"></i> Pesanan
                </a> --}}
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table table-bordered border-dark table-hover table-orders w-auto" id="myTable" cellspacing="0" style="table-layout: auto">
                        <thead>
                            <tr class="table-secondary">
                                <th class="align-top">No</th>
                                <th class="align-top">Nama</th>
                                <th class="align-top">Wa</th>
                                {{-- <th class="align-top">Kategori</th> --}}
                                <th class="align-top">Jenis</th>
                                <th class="align-top" style="width: 50px">P x L</th>
                                <th class="align-top">Harga Per Meter</th>
                                {{-- <th class="align-top">Provinsi</th> --}}
                                <th class="align-top">Kabupaten</th>
                                <th class="align-top">Harga Barang</th>
                                <th class="align-top">Total</th>
                                <th class="align-top">Kode Pesanan</th>
                                <th class="align-top">Status</th>
                                <th class="align-top">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $ord)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ord->name }}</td>
                                    <td>{{ $ord->wa }}</td>
                                    {{-- <td>{{ $ord->panel->category ?? 'kosong' }}</td> --}}
                                    <td>{{ $ord->panel->type ?? 'kosong' }}</td>
                                    <td>{{ intval($ord->length) }} x {{ intval($ord->width) }}</td>
                                    <td>{{ $ord->panel->price ? 'Rp. ' . number_format($ord->panel->price, 0, ',', '.') : 'Rp. 0' }}
                                    </td>
                                    {{-- <td>{{ $ord->provinces->name ?? 'kosong' }}</td> --}}
                                    <td>{{ $ord->regency ?? 'kosong' }}</td>

                                    <td>
                                        {{ $ord->result ? 'Rp. ' . number_format($ord->result, 0, ',', '.') : 'Rp. 0' }}
                                    </td>

                                    <td>
                                        {{ isset($ord->addfee->fee_total) ? 'Rp. ' . number_format($ord->addfee->fee_total, 0, ',', '.') : 'Rp. 0' }}
                                    </td>

                                    <td>
                                        <form action="{{ route('orders.status', $ord->id) }}" method="POST"
                                            id="status-form-{{ $ord->id }}">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control width: 200px"
                                                onchange="document.getElementById('status-form-{{ $ord->id }}').submit();"
                                                id="status-select-{{ $ord->id }}">
                                                <option value="Prosses" class="status-prosses"
                                                    {{ $ord->status == 'Prosses' ? 'selected' : '' }}>Prosses</option>
                                                <option value="Approve" class="status-approve"
                                                    {{ $ord->status == 'Approve' ? 'selected' : '' }}>Approve</option>
                                                <option value="Reject" class="status-reject"
                                                    {{ $ord->status == 'Reject' ? 'selected' : '' }}>Reject</option>
                                            </select>
                                        </form>
                                    </td>

                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item mb-1 mr-0">
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('orders.edit', $ord->id) }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item mb-1 mr-0">
                                                <a class="btn btn-secondary btn-sm"
                                                    href="{{ route('orders.show', $ord->id) }}">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $ord->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </li>
                                        </ul>

                                    </td>
                                </tr>

                                <div class="modal fade" id="deleteModal{{ $ord->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Alert !!!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('orders.destroy', $ord->id) }}" method="POST"
                                                    class="action-buttons">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p>Apakah anda yakin ingin menghapus pesanan <strong>{{ $ord->name }}</strong> ?</p>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Back</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

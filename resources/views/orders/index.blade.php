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
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h3 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h3>
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('orders.create') }}">
                    <i class="bi bi-plus fa-sm text-white-50"></i> Pesanan
                </a>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Wa</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Harga Per Meter</th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                                <th>Harga Barang</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lokasi as $l)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $l->name }}</td>
                                    <td>{{ $l->wa }}</td>
                                    <td>{{ $l->panel->category ?? 'kosong' }}</td>
                                    <td>{{ $l->panel->type ?? 'kosong' }}</td>
                                    <td>{{ $l->panel->price ? 'Rp. ' . number_format($l->panel->price, 0, ',', '.') : 'Rp. 0' }}
                                    </td>
                                    <td>{{ $l->provinces->name ?? 'kosong' }}</td>
                                    <td>{{ $l->regency ?? 'kosong' }}</td>

                                    <td>
                                        {{ $l->result ? 'Rp. ' . number_format($l->result, 0, ',', '.') : 'Rp. 0' }}
                                    </td>

                                    <td>
                                        {{ isset($l->addfee->fee_total) ? 'Rp. ' . number_format($l->addfee->fee_total, 0, ',', '.') : 'Rp. 0' }}
                                    </td>

                                    <td>
                                        <form action="{{ route('orders.status', $l->id) }}" method="POST"
                                            id="status-form-{{ $l->id }}">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control width: 200px"
                                                onchange="document.getElementById('status-form-{{ $l->id }}').submit();"
                                                id="status-select-{{ $l->id }}">
                                                <option value="Prosses" class="status-prosses"
                                                    {{ $l->status == 'Prosses' ? 'selected' : '' }}>Prosses</option>
                                                <option value="Approve" class="status-approve"
                                                    {{ $l->status == 'Approve' ? 'selected' : '' }}>Approve</option>
                                                <option value="Reject" class="status-reject"
                                                    {{ $l->status == 'Reject' ? 'selected' : '' }}>Reject</option>
                                            </select>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="{{ route('orders.destroy', $l->id) }}" method="POST"
                                            class="action-buttons">
                                            @csrf
                                            @method('DELETE')
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item mb-1 mr-0">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('orders.edit', $l->id) }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item mb-1 mr-0">
                                                    <a class="btn btn-secondary btn-sm"
                                                        href="{{ route('orders.show', $l->id) }}">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">

                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

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
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('lokasi.create') }}">
                    <i class="bi bi-plus fa-sm text-white-50"></i> Pesanan
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Wa</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>PxL</th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lokasi as $l)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $l->nama }}</td>
                                    <td>{{ $l->wa }}</td>
                                    <td>{{ $l->kategori }}</td>
                                    <td>{{ $l->jenis }}</td>
                                    <td>{{ $l->panjang }}x{{ $l->lebar }}</td>
                                    <td>{{ $l->provinsi }}</td>
                                    <td>{{ $l->kabupaten }}</td>
                                    <td>
                                        {{ $l->result ? 'Rp. ' . number_format($l->result, 0, ',', '.') : 'Rp. 0' }}
                                    </td>
                                    <td>
                                        {{ $l->tambahRp ? 'Rp. ' . number_format($l->tambahRp->total_biaya, 0, ',', '.') : 'Rp. 0' }}
                                    </td>
                                    <td>
                                        <form action="{{ route('lokasi.status', $l->id) }}" method="POST"
                                            id="status-form-{{ $l->id }}">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control width: 200px"
                                                onchange="document.getElementById('status-form-{{ $l->id }}').submit();"
                                                style="background-color: {{ $l->status == 'pending' ? '#f7b731' : ($l->status == 'approved' ? '#20bf6b' : ($l->status == 'rejected' ? '#eb3b5a' : '#ffffff')) }};">
                                                <option value="pending" style="background-color: #f7b731; color: #ffffff;"
                                                    {{ $l->status == 'pending' ? 'selected' : '' }}>Proses</option>
                                                <option value="approved" style="background-color: #20bf6b; color: #ffffff;"
                                                    {{ $l->status == 'approved' ? 'selected' : '' }}>Approv</option>
                                                <option value="rejected" style="background-color: #eb3b5a; color: #ffffff;"
                                                    {{ $l->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('lokasi.destroy', $l->id) }}" method="POST" class="action-buttons">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item mb-1 mr-0">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('lokasi.edit', $l->id) }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item mb-1">
                                                    <a class="btn btn-secondary btn-sm" href="{{ route('lokasi.show', $l->id) }}">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
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

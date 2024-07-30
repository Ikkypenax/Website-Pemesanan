@extends('layouts.app')

@section('title', 'List Pesanan')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h2>Daftar Pesanan</h2>
                <a class="btn btn-primary" href="{{ route('lokasi.create') }}">
                    <i class="bi bi-plus-circle-dotted"></i>
                </a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Wa</th>
                    <th>Kategori</th>
                    <th>Jenis</th>
                    <th>P x L</th>
                    <th>Provinsi</th>
                    <th>Kabupaten</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <thead>
                <tbody>
                    @foreach ($lokasi as $l)
                        <tr>
                            <td data-label="No">{{ $loop->iteration }}</td>
                            <td data-label="Nama">{{ $l->nama }}</td>
                            <td data-label="Wa">{{ $l->wa }}</td>
                            <td data-label="Kategori">{{ $l->kategori }}</td>
                            <td data-label="Jenis">{{ $l->jenis }}</td>
                            <td data-label="P x L">{{ $l->panjang }} x {{ $l->lebar }}</td>
                            <td data-label="Provinsi">{{ $l->provinsi }}</td>
                            <td data-label="Kabupaten">{{ $l->kabupaten }}</td>
                            <td data-label="Harga">
                                {{ $l->result ? 'Rp. ' . number_format($l->result, 0, ',', '.') : 'Rp. 0' }}
                            </td>
                            <td data-label="Total">
                                {{ $l->tambahRp ? 'Rp. ' . number_format($l->tambahRp->total_biaya, 0, ',', '.') : 'Rp. 0' }}
                            </td>
                            <td data-label="Status">
                                <form action="{{ route('lokasi.status', $l->id) }}" method="POST"
                                    id="status-form-{{ $l->id }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="status"
                                        onchange="document.getElementById('status-form-{{ $l->id }}').submit();"
                                        style="background-color: {{ $l->status == 'pending' ? '#f7b731' : ($l->status == 'approved' ? '#20bf6b' : ($l->status == 'rejected' ? '#eb3b5a' : '#ffffff')) }}">
                                        <option value="pending" style="background-color: #f7b731; color: #ffffff;"
                                            {{ $l->status == 'pending' ? 'selected' : '' }}>Diproses</option>
                                        <option value="approved" style="background-color: #20bf6b; color: #ffffff;"
                                            {{ $l->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" style="background-color: #eb3b5a; color: #ffffff;"
                                            {{ $l->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </form>
                            </td>
                            <td data-label="Action">
                                <form action="{{ route('lokasi.destroy', $l->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('lokasi.edit', $l->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>


@endsection

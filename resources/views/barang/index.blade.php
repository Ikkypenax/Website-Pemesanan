@extends('layouts.app')

@section('title', 'List Barang')

@section('content')

    <div class="container-fluid">

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                {{ $message }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h3 class="m-0 font-weight-bold text-primary">Daftar Barang</h3>
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('barang.create') }}">
                    <i class="bi bi-plus fa-sm text-white-50"></i> Barang
                </a>
            </div>

            <div class="card-body pt-0">
                <div class="table-responsive" id="dataTable" width="100%" cellspacing="0">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategory</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $b)
                                <tr>
                                    <td data-label="No">{{ $loop->iteration }}</td>
                                    <td data-label="Nama">{{ $b->jenis }}</td>
                                    <td data-label="Kategory">{{ $b->kategori->nama_kategori ?? 'Tidak Ada Kategori' }}</td>
                                    <td data-label="Harga">
                                        {{ $b->harga ? 'Rp. ' . number_format($b->harga, 0, ',', '.') : 'Rp. 0' }}</td>
                                    <td data-label="Aksi">
                                        <form action="{{ route('barang.destroy', $b->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item mb-1 mr-0">
                                                    <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">

                                                    <button type="submit" class="btn btn-danger"
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

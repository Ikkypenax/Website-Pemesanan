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
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('panel.create') }}">
                    <i class="bi bi-plus fa-sm text-white-50"></i> Barang
                </a>
            </div>

            <div class="card-body pt-0">
                <div class="table-responsive" id="dataTable" width="100%" cellspacing="0">
                    <table id="myTable" class="table table-panel table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-secondary align-top">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($panel as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td data-label="Nama">{{ $p->type }}</td>
                                    <td data-label="Kategori">{{ $p->category }}</td>
                                    <td data-label="Harga">
                                        {{ $p->price ? 'Rp. ' . number_format($p->price, 0, ',', '.') : 'Rp. 0' }}
                                    </td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item mb-1 mr-0">
                                                <a href="{{ route('panel.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $p->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <div class="modal fade" id="deleteModal{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Alert !!!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('panel.destroy', $p->id) }}" method="POST"
                                                    class="action-buttons">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p>Apakah anda yakin ingin menghapus?</p>
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

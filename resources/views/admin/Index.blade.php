@extends('layouts.app')

@section('title', 'List Admin')

@section('content')

        {{-- <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <form action="{{ route('superadmin.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus admin ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}

        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3 mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Daftar Admin</h3>
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('superadmin.create') }}">
                    <i class="bi bi-plus fa-sm text-white-50"></i> Admin
                </a>
            </div>

            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table id="myTableAdmin" class="table table-admin table-bordered border-dark table-hover" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr class="table-secondary align-top">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td data-label="Nama">{{ $admin->name }}</td>
                                    <td data-label="Email">{{ $admin->email }}</td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $admin->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                {{-- Modal Delete Panel --}}
                                <div class="modal fade" id="deleteModal{{ $admin->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Alert !!!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('superadmin.destroy', $admin->id) }}" method="POST"
                                                    class="action-buttons">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p>Apakah anda yakin ingin menghapus barang
                                                        <strong>{{ $admin->email }}</strong> ?</p>
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
    @endsection

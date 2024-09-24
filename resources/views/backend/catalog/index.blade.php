@extends('layouts.app')

@section('title', 'Catalog')

@section('content')
    <div class="container-fluid">

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                {{ $message }}
            </div>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Image Preview</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img id="modalImage" src="" width="100%">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="card shadow mb-0">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h3 class="m-0 font-weight-bold text-primary">Daftar Katalog</h3>
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('catalog.create') }}">
                    <i class="bi bi-plus fa-sm text-white-50"></i> Katalog
                </a>
            </div>

            <div class="card-body pt-0">
                <div class="table-responsive" id="dataTable" width="100%" cellspacing="0">
                    <table id="myTable" class="table table-catalog table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-secondary align-top">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>RefreshRate</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catalog as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td data-label='Nama'>{{ $c->name }}</td>
                                    <td data-label='Deskripsi'>{{ $c->description }}</td>
                                    <td data-label='Refreshrate'>{{ $c->refreshrate }} Hz</td>
                                    <td><img src="{{ asset('storage/images/' . $c->image) }}" width="100"></td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item mb-1 mr-0">
                                                <a href="{{ route('catalog.edit', $c->id) }}"
                                                    class="btn btn-warning btn-sm ">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item mb-1 mr-0">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    onclick="showImage('{{ asset('storage/images/' . $c->image) }}')">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $c->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <div class="modal fade" id="deleteModal{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Alert !!!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('catalog.destroy', $c->id) }}" method="POST"
                                                    class="action-buttons">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p>Apakah anda yakin ingin menghapus katalog <strong>{{ $c->name }}</strong> ?</p>
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

    <script>
        function showImage(imageSrc) {
            // console.log(imageSrc);
            document.getElementById('modalImage').src = imageSrc;
        }
    </script>

@endsection

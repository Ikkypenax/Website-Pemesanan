@extends('layouts.app')

@section('title', 'Catalog')

@section('content')
    <div class="container-fluid">

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

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                {{ $message }}
            </div>
        @endif
        <div class="card shadow mb-0">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h3 class="m-0 font-weight-bold text-primary">Daftar Katalog</h3>
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('catalog.create') }}">
                    <i class="bi bi-plus fa-sm text-white-50"></i> Katalog
                </a>
            </div>

            <div class="card-body pt-0">
                <div class="table-responsive" id="dataTable" width="100%" cellspacing="0">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>RereshRate</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catalog as $c)
                                <tr>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->description }}</td>
                                    <td>{{ $c->freshrate }}</td>
                                    <td><img src="{{ asset('storage/images/' . $c->image) }}" width="100"></td>
                                    <td>
                                        <a href="{{ route('catalog.edit', $c->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            onclick="showImage('{{ asset('storage/images/' . $c->image) }}')">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <form action="{{ route('catalog.destroy', $c->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
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

    <script>
        function showImage(imageSrc) {
            // console.log(imageSrc);
            document.getElementById('modalImage').src = imageSrc;
        }
    </script>

@endsection

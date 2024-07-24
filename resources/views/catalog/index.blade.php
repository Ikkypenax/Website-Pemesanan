@extends('layouts.app')

@section('title', 'Catalog')

@section('content')
<div class="container">

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

    <div class="row" style="margin-top: 8px">
        <div class="col-md-12">
            <h2>Catalog Display</h2>
            <a href="{{ route('catalog.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle-dotted"></i>
            </a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-2">
                    {{ $message }}
                </div>
            @endif

            <table class="table mt-3">
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
                    @foreach($catalog as $c)
                    <tr>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->description }}</td>
                        <td>{{ $c->freshrate }}</td>
                        <td><img src="{{ asset('storage/images/' . $c->image) }}" width="100"></td>
                        <td>
                            <a href="{{ route('catalog.edit', $c->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('catalog.destroy', $c->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="showImage('{{ asset('storage/images/' . $c->image) }}')">Preview</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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

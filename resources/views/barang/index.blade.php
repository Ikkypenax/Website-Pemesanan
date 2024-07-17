@extends('layouts.app')

@section('title', 'List Barang')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Barang</h1>
            <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-2">
                    {{ $message }}
                </div>
            @endif

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Kategory</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $b)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $b->jenis }}</td>
                            <td>{{ $b->harga }}</td>
                            <td>{{ $b->kategori }}</td>
                            <td>
                                <form action="{{ route('barang.destroy', $b->id) }}" method="POST" style="display:inline-block;">
                                <a href="{{ route('barang.show', $b->id) }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning">Edit</a>
                                
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
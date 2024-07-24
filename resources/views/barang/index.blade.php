@extends('layouts.app')

@section('title', 'List Barang')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h2>Daftar Barang</h2>
                <a href="{{ route('barang.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle-dotted"></i>
                </a>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success mt-2">
                        {{ $message }}
                    </div>
                @endif

                <table class="table table-bordered mt-3">
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
                                        <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
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

@endsection

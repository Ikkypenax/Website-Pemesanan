@extends('layouts.app')

@section('title', 'List Barang')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Daftar Barang</h1>
                <a href="{{ route('barang.create') }}" class="btn btn-primary">
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
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $b->jenis }}</td>
                                <td>{{ $b->kategori->nama_kategori ?? 'Tidak Ada Kategori' }}</td>
                                <td>{{ $b->harga ? 'Rp. ' . number_format($b->harga, 0, ',', '.') : 'Rp. 0' }}</td>
                                <td>
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

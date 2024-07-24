@extends('layouts.app')

@section('title', 'List Barang')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left w-100 d-flex justify-content-between">
                    <div>
                        <div class="d-flex">
                            <div class="pull-right" style="margin-right: 16px">
                                <a class="btn btn-primary" href="{{ route('barang.index') }}">
                                    <i class="bi bi-arrow-left-square"></i>
                                </a>
                            </div>
                            <h2>Add Barang</h2>
                        </div>
                    </div>

                    <div>

                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-container mt-3">
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jenis">Jenis Barang</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>
                <div class="form-group">
                    <label for="kategori_id">Kategori</label>
                    <select id="kategori_id" name="kategori_id" class="form-control">
                        <option value="" selected>Pilih kategori</option>
                        @foreach ($barang as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection

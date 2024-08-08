@extends('layouts.app')

@section('title', 'List Catalog')

@section('content')

    <div class="container mt-3">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center py-3">
                <div class="pull-right" style="margin-right: 16px">
                    <a class="btn btn-primary" href="{{ route('catalog.index') }}">
                        <i class="bi bi-arrow-left-square"></i>
                    </a>
                </div>
                <h3 class="m-0 font-weight-bold text-primary">Tambah Katalog</h3>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body">
                <form action="{{ route('catalog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="freshrate">Fresh Rate:</label>
                        <input type="text" name="freshrate" id="freshrate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar:</label>
                        <input type="file" name="gambar" id="gambar" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>

            </div>
        </div>
    </div>
    
@endsection

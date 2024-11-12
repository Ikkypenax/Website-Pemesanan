@extends('layouts.app')

@section('title', 'Add Catalog')

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

            {{-- Form Create Catalog --}}
            <div class="card-body">
                <form action="{{ route('catalog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Ups!</strong> Terjadi kesalahan.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi:</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="refreshrate">Fresh Rate:</label>
                        <input type="text" name="refreshrate" id="refreshrate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar:</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>

            </div>
        </div>
    </div>

@endsection

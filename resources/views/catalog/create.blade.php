@extends('layouts.app')

@section('title', 'List Catalog')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left w-100 d-flex justify-content-between">
                    <div>
                        <div class="d-flex">
                            <div class="pull-right" style="margin-right: 16px">
                                <a class="btn btn-primary" href="{{ route('catalog.index') }}">
                                    <i class="bi bi-arrow-left-square"></i>
                                </a>
                            </div>
                            <h2>Tambah Catalog</h2>
                        </div>
                    </div>
                </div>

                <div>

                </div>
            </div>
        </div>


        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-container mt-3">
            <form action="{{ route('catalog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi:</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="freshrate">Fresh Rate:</label>
                    <input type="text" name="freshrate" id="freshrate" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Gambar:</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>

        </div>
    </div>
@endsection

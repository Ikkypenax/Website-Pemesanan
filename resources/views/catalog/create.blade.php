@extends('layouts.app')

@section('title', 'List Cataloge')

@section('content')
    <div class="container mt-5">
        <h2>Tambah Catalog</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
            {{-- <div class="form-group">
                <label for="price">Harga:</label>
                <input type="text" name="price" id="price" class="form-control">
            </div> --}}
            <div class="form-group">
                <label for="freshrate">Fresh Rate:</label>
                <input type="text" name="freshrate" id="freshrate" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    @endsection

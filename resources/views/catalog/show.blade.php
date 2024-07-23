
@extends('layouts.app')

@section('title', 'Show Catalog')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Show Catalog</h1>

            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    <h1>Detail Produk</h1>
    <div>
        <strong>Nama:</strong> {{ $catalog->name }}<br>
        <strong>Deskripsi:</strong> {{ $catalog->description }}<br>
        <strong>Harga:</strong> {{ $catalog->price }}<br>
        <strong>Ukuran:</strong> {{ $catalog->size }}<br>
        <strong>Gambar:</strong> <img src="{{ asset('storage/image' . $catalog->image=$path) }}" alt="{{ $catalog->name }}" width="200"><br>
    </div>
    <a href="{{ route('catalog.index') }}" class="btn btn-primary">Kembali</a>
@endsection

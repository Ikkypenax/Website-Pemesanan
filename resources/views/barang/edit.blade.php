@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Barang</h1>

            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="jenis">jenis:</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $barang->jenis }}">
                </div>

                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $barang->harga }}">
                </div>

                <div class="form-group">
                    <label for="kategori_id">Kategori:</label>
                    <select id="kategori_id" name="kategori_id" class="form-control">
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}" {{ $barang->kategori_id == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('title', 'Add Barang')

@section('content')

    <div class="container mt-3">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center py-3">
                <div class="pull-right" style="margin-right: 16px">
                    <a class="btn btn-primary" href="{{ route('panel.index') }}">
                        <i class="bi bi-arrow-left-square"></i>
                    </a>
                </div>
                <h3 class="m-0 font-weight-bold text-primary">Tambah Barang</h3>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <div class="card-body">
                <form action="{{ route('panel.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="type">Jenis Barang</label>
                        <input type="text" class="form-control" id="type" name="type" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select id="category" name="category" class="form-control">
                            <option value="" selected>Pilih kategori</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>

@endsection

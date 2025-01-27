@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')

    <div class="container mt-3">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center py-3">
                <div class="pull-right" style="margin-right: 16px">
                    <a class="btn btn-primary" href="{{ route('panel.index') }}">
                        <i class="bi bi-arrow-left-square"></i>
                    </a>
                </div>
                <h3 class="m-0 font-weight-bold text-primary">Edit Barang</h3>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Edit Panel --}}
            <div class="card-body">
                <form action="{{ route('panel.update', $panel->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="type">Jenis:</label>
                        <input type="text" class="form-control" id="type" name="type"
                            value="{{ $panel->type }}">
                    </div>

                    <div class="form-group">
                        <label for="price">Harga:</label>
                        <input type="number" class="form-control" id="price" name="price"
                            value="{{ intval($panel->price) ?? 0 }}">
                    </div>

                    <div class="form-group">
                        <label for="rental">Sewa:</label>
                        <input type="number" class="form-control" id="rental" name="rental"
                            value="{{ intval($panel->rental) ?? 0 }}">
                    </div>

                    <div class="form-group">
                        <label for="category">Kategori:</label>
                        <select id="category" name="category" class="form-control">
                            @foreach ($category as $cat)
                                <option value="{{ $cat }}" {{ $panel->category === $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection

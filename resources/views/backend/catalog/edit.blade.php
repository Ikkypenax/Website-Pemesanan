@extends('layouts.app')

@section('title', 'Edit Catalog')

@section('content')

    <div class="container mt-3">


        <div class="card mb-4">
            <div class="card-header d-flex align-items-center py-3">
                <div class="pull-right" style="margin-right: 16px">
                    <a class="btn btn-primary" href="{{ route('catalog.index') }}">
                        <i class="bi bi-arrow-left-square"></i>
                    </a>
                </div>
                <h3 class="m-0 font-weight-bold text-primary">Edit Katalog</h3>
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

            <div class="card-body">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                
                <form action="{{ route('catalog.update', $catalog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $catalog->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi:</label>
                        <textarea name="description" id="description" class="form-control">{{ $catalog->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="refreshrate">Fresh Rate:</label>
                        <input type="text" name="refreshrate" id="refreshrate" class="form-control"
                            value="{{ $catalog->refreshrate }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar:</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                        <img src="{{ $catalog->image }}" alt="">
                        <p>{{ $catalog->image }}</p>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

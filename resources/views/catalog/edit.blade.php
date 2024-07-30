@extends('layouts.app')

@section('title', 'Edit Cataog')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex">
                    <div class="pull-right" style="margin-right: 16px">
                        <a class="btn btn-primary" href="{{ route('catalog.index') }}"><b>
                                <i class="bi bi-arrow-left-square"></i>
                        </a>
                    </div>
                    <h2>Edit Catalog</h2>
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

                <div class="form-container mt-3">
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
                            <label for="freshrate">Fresh Rate:</label>
                            <input type="text" name="freshrate" id="freshrate" class="form-control"
                                value="{{ $catalog->freshrate }}">
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
    </div>
@endsection


@extends('layouts.app')

@section('title', 'Edit Cataog')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Catalog</h1>

            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<form action="{{ route('catalog.update', $catalog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $catalog->name }}">
    </div>
    <div class="form-group">
        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description" class="form-control">{{ $catalog->description }}</textarea>
    </div>
    {{-- <div class="form-group">
        <label for="price">Harga:</label>
        <input type="text" name="price" id="price" class="form-control" value="{{ $catalog->price }}">
    </div> --}}
    <div class="form-group">
        <label for="freshrate">Fresh Rate:</label>
        <input type="text" name="freshrate" id="freshrate" class="form-control" value="{{ $catalog->freshrate }}">
    </div>
    <div class="form-group">
        <label for="image">Gambar:</label>
        <input type="file" name="image" id="image" class="form-control-file">
        <img src="{{$catalog->image}}" alt="">
        <p>{{$catalog->image}}</p>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection

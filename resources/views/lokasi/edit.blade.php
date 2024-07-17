@extends('layouts.app')

@section('title', 'Edit Lokasi')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Lokasi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('lokasi.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('lokasi.update',$lokasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Provinsi:</strong>
                    <input type="text" name="provinsi" value="{{ $lokasi->provinsi }}" class="form-control" placeholder="Provinsi">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kabupaten:</strong>
                    <input type="text" name="kabupaten" value="{{ $lokasi->kabupaten }}" class="form-control" placeholder="Kabupaten">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kecamatan:</strong>
                    <input type="text" name="kecamatan" value="{{ $lokasi->kecamatan }}" class="form-control" placeholder="Kecamatan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection

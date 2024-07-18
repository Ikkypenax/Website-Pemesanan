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

        <form action="{{ route('lokasi.update', $lokasi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        <input type="text" name="nama" value="{{ $lokasi->nama }}" class="form-control"
                            placeholder="nama">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Wa:</strong>
                        <input type="text" name="wa" value="{{ $lokasi->wa }}" class="form-control"
                            placeholder="wa">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kategori:</strong>
                        <input type="text" name="kategori" value="{{ $lokasi->kategori }}" class="form-control"
                            placeholder="kategori">
                    </div>
                </div>
                    {{-- <select class="form-control" id="kategori" name="kategori" required>
                    @if ($barang)
                        @foreach ($barang as $b)
                            <option value="{{ $b->kategori }}" data-harga="{{ $b->harga }}">{{ $b->kategori }}
                            </option>
                        @endforeach
                    @else
                        <option>Tidak ada kategori tersedia</option>
                    @endif
                    </select> --}}

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jenis:</strong>
                        <input type="text" name="jenis" value="{{ $lokasi->jenis }}" class="form-control"
                            placeholder="jenis">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="harga" class="form-label">Harga per Meter</label>
                        <p class="form-control-plaintext" id="harga" name="harga" data-harga="0">-</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Panjang:</strong>
                        <input type="text" name="panjang" value="{{ $lokasi->panjang }}" class="form-control"
                            placeholder="panjang">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lebar:</strong>
                        <input type="text" name="lebar" value="{{ $lokasi->lebar }}" class="form-control"
                            placeholder="lebar">
                    </div>
                </div>

                <span for="result" id="result" name="result" class="ms-3">Total: Rp. 0</span>

                <input type="hidden" id="result_hidden" name="result">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Provinsi:</strong>
                        <input type="text" name="provinsi" value="{{ $lokasi->provinsi }}" class="form-control"
                            placeholder="Provinsi">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kabupaten:</strong>
                        <input type="text" name="kabupaten" value="{{ $lokasi->kabupaten }}" class="form-control"
                            placeholder="Kabupaten">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kecamatan:</strong>
                        <input type="text" name="kecamatan" value="{{ $lokasi->kecamatan }}" class="form-control"
                            placeholder="Kecamatan">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection

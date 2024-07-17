@extends('layouts.app')

@section('title', 'List Lokasi')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New Lokasi</h2>
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

        <form action="{{ route('lokasi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="wa" class="form-label">WA</label>
                <input type="text" class="form-control" id="wa" name="wa" required>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <label for="panjang" class="form-label">Panjang</label>
                    <input type="number" class="form-control" id="panjang" name="panjang" required>
                </div>
                <div class="col">
                    <label for="lebar" class="form-label">Lebar</label>
                    <input type="number" class="form-control" id="lebar" name="lebar" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="harga_per_meter" class="form-label">Harga per Meter</label>
                <p class="form-control-plaintext" id="harga_per_meter">{{ $hargaPerMeter->harga }}</p>
            </div>
            <div class="mb-3">
                <label for="provinsi" class="form-label">Provinsi</label>
                <select class="form-control" id="provinsi" name="provinsi" required>
                    <option selected>Pilih Provinsi</option>
                    @foreach ($provinces as $provinsi)
                        <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="kabupaten" class="form-label">Kabupaten</label>
                <select class="form-control" id="kabupaten" name="kabupaten" required>
                    <option selected>Pilih Kabupaten</option>
                   
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <span id="result" class="ms-3"></span>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const panjangInput = document.getElementById('panjang');
            const lebarInput = document.getElementById('lebar');
            const hargaPerMeter = {{ $hargaPerMeter->harga }};
            const resultSpan = document.getElementById('result');

            function calculateResult() {
                const panjang = parseFloat(panjangInput.value) || 0;
                const lebar = parseFloat(lebarInput.value) || 0;
                const result = panjang * lebar * hargaPerMeter;
                resultSpan.textContent = `Total: Rp. ${result.toLocaleString()}`;
            }

            panjangInput.addEventListener('input', calculateResult);
            lebarInput.addEventListener('input', calculateResult);
        });
    </script>
@endsection

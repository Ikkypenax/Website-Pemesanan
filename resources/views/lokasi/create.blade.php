@extends('layouts.app')

@section('title', 'List Lokasi')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left w-100 d-flex justify-content-between">
                    <div>
                        <div class="d-flex">
                            <div class="pull-right" style="margin-right: 16px">
                                <a class="btn btn-primary" href="{{ route('lokasi.index') }}">
                                    <i class="bi bi-arrow-left-square"></i>
                                </a>
                            </div>
                            <h2>Add Lokasi</h2>
                        </div>
                    </div>

                    <div>

                    </div>
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

        <div class="form-container mt-3">
            <form action="{{ route('lokasi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="wa" class="form-label">WA</label>
                    <input type="text" class="form-control" id="wa" name="wa" required>
                </div>
                <div class="form-group">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-control" id="kategori" name="kategori" required>
                        <option value="" selected>Pilih kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->nama_kategori }}">{{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis" class="form-label">Nama Barang</label>
                    <select class="form-control" id="jenis" name="jenis" required>
                        <option value="" selected>Pilih Jenis Barang</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="harga" class="form-label">Harga per Meter</label>
                    <p class="form-control-plaintext" id="harga" name="harga" data-harga="0">-</p>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="panjang" class="form-label">Panjang</label>
                        <input type="number" class="form-control" id="panjang" name="panjang" required>
                    </div>
                    <div class="col">
                        <label for="lebar" class="form-label">Lebar</label>
                        <input type="number" class="form-control" id="lebar" name="lebar" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col">
                        <label for="result" id="result" name="result" class="ms-3" style="font-size: 14pt">Total: Rp. 0</label>
                        <input type="hidden" id="result_hidden" name="result">
                    </div>
                </div>

                <div class="form-group">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <select class="form-control" id="provinsi" name="provinsi" required>
                        <option value="" selected>Pilih Provinsi</option>
                        @foreach ($provinces as $provinsi)
                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kabupaten" class="form-label">Kabupaten</label>
                    <select class="form-control" id="kabupaten" name="kabupaten" required>
                        <option value="" selected>Pilih Kabupaten</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kategori').on('change', function() {
                var kategori_id = $(this).val();
                var kategori_nama = $(this).val();
                if (kategori_nama) {
                    $.ajax({
                        url: '/getJenis/' + kategori_nama,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#jenis').empty().append(
                                '<option selected>Pilih Jenis Barang</option>');
                            if (data.length > 0) {
                                $.each(data, function(key, item) {
                                    $('#jenis').append('<option value="' + item.id +
                                        '" data-harga="' + item.harga + '">' + item
                                        .jenis + '</option>');
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#jenis').empty().append('<option selected>Pilih Jenis Barang</option>');
                }
            });

            $('#jenis').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var harga = parseFloat(selectedOption.data('harga')) || 0;
                $('#harga').text(harga.toLocaleString()).data('harga', harga);

                $('#panjang, #lebar').trigger('input');
            });

            $('#panjang, #lebar').on('input', function() {
                var panjang = parseFloat($('#panjang').val()) || 0;
                var lebar = parseFloat($('#lebar').val()) || 0;
                var harga = parseFloat($('#harga').data('harga')) || 0;
                var result = panjang * lebar * harga;


                var formattedResult = result.toFixed(2);

                $('#result').text(`Total: Rp. ${parseFloat(formattedResult).toLocaleString()}`);
                $('#result_hidden').val(formattedResult);
            });


            $('form').on('submit', function() {
                var total = $('#result_hidden').val();
                $('#result_hidden').val(parseFloat(total).toFixed(2));
            });
        });
    </script>


@endsection

@extends('layouts.layouts')

@section('title', 'Order')

@section('content')

    <div class="card-order">
        <form action="{{ route('order.store') }}" method="POST">
            <h2 class="text-primary">Buat Pesanan Sekarang</h2>
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

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
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
                    <label for="hasil" id="hasil" name="hasil" class="ms-3" style="font-weight: bold; font-size: 16pt; color: green">Total: Rp.
                        0</label>
                    <input type="hidden" id="hasil_hidden" name="hasil">
                </div>
                <span>*Belum termasuk biaya lainnya</span>
            </div>


            <div class="form-group">
                <label for="provinsi" class="form-label">Provinsi</label>
                <select class="form-control" id="provinsi" name="provinsi" required>
                    <option value="" selected>Pilih Provinsi</option>
                    @foreach ($provinces as $provinsi)
                        <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="kabupaten" class="form-label">Kabupaten</label>
                <select class="form-control" id="kabupaten" name="kabupaten" required>
                    <option value="" selected>Pilih Kabupaten</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Pesan</button>
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kategori').on('change', function() {
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

            $('#provinsi').on('change', function() {
                var id_provinsi = $(this).val();
                if (id_provinsi) {
                    $.ajax({
                        url: '/getKabupaten/' + id_provinsi,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#kabupaten').empty().append(
                                '<option selected>Pilih Kabupaten</option>');
                            if (data.length > 0) {
                                $.each(data, function(key, kabupaten) {
                                    $('#kabupaten').append('<option value="' + kabupaten
                                        .id + '">' + kabupaten.nama + '</option>');
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#kabupaten').empty().append('<option selected>Pilih Kabupaten</option>');
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
                var hasil = panjang * lebar * harga;
                var formattedhasil = hasil.toFixed(2);
                $('#hasil').text(`Total: Rp. ${parseFloat(formattedhasil).toLocaleString()}`);
                $('#hasil_hidden').val(formattedhasil);
            });

            $('form').on('submit', function() {
                var total = $('#hasil_hidden').val();
                $('#hasil_hidden').val(parseFloat(total).toFixed(2));
            });
        });
    </script>
@endsection

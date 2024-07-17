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
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-control" id="kategori" name="kategori" required>
                    <option selected>Pilih kategori</option>
                    @foreach ($hargaPerMeter as $item)
                        <option value="{{ $item->kategori }}" data-harga="{{ $item->harga }}">{{ $item->kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Nama Barang</label>
                <select class="form-control" id="jenis" name="jenis" required>
                    <option selected>Pilih Jenis Barang</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga per Meter</label>
                <p class="form-control-plaintext" id="harga" name="harga" data-harga="0">-</p>
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
            <span for="result" id="result" name="result" class="ms-3">Total: Rp. 0</span>

            <input type="hidden" id="result_hidden" name="result">

            <div class="mb-3">
                <label for="provinsi" class="form-label">Provinsi</label>
                <select class="form-control" id="provinsi" name="provinsi" required>
                    <option selected>Pilih Provinsi</option>
                    @foreach ($provinces as $provinsi)
                        <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
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
        </form>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    {{-- <script>
    $(document).ready(function() {
    $('#kategori').on('change', function() {
        var kategori = $(this).val();
        if (kategori) {
            $.ajax({
                url: '/getJenis/' + kategori,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#jenis').empty().append('<option selected>Pilih Jenis Barang</option>');
                    if (data.length > 0) {
                        $.each(data, function(key, item) {
                            $('#jenis').append('<option value="' + item.jenis + '">' + item.jenis + '</option>');
                        });
                    }
                }
            });
        } else {
            $('#jenis').empty().append('<option selected>Pilih Jenis Barang</option>');
        }
    });

    $('#jenis').on('change', function() {
        var jenis = $(this).val();
        if (jenis) {
            $.ajax({
                url: '/getHarga/' + jenis,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    if (data) {
                        $('#harga').text(data.harga).data('harga', data.harga);
                    } else {
                        $('#harga').text('-').data('harga', 0);
                    }
                    // Trigger input event to recalculate the total price
                    $('#panjang, #lebar').trigger('input');
                }
            });
        } else {
            $('#harga').text('-').data('harga', 0);
            $('#panjang, #lebar').trigger('input');
        }
    });

    $('#panjang, #lebar').on('input', function() {
        var panjang = parseFloat($('#panjang').val()) || 0;
        var lebar = parseFloat($('#lebar').val()) || 0;
        var harga = parseFloat($('#harga').data('harga')) || 0;
        var result = panjang * lebar * harga;
        $('#result').text(`Total: Rp. ${result.toLocaleString()}`);
    });

    $('#kategori').on('change', function() {
        var selectedOption = $(this).find('option:selected');
        var harga = parseFloat(selectedOption.data('harga')) || 0;
        $('#harga').text(harga.toLocaleString()).data('harga', harga);

        // Trigger input event to recalculate the total price
        $('#panjang, #lebar').trigger('input');
    });
});
</script> --}}

    <script>
        $(document).ready(function() {
            $('#kategori').on('change', function() {
                var kategori = $(this).val();
                if (kategori) {
                    $.ajax({
                        url: '/getJenis/' + kategori,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#jenis').empty().append(
                                '<option selected>Pilih Jenis Barang</option>');
                            if (data.length > 0) {
                                $.each(data, function(key, item) {
                                    $('#jenis').append('<option value="' + item.jenis +
                                        '" data-harga="' + item.harga + '">' + item
                                        .jenis + '</option>');
                                });
                            }
                        }
                    });
                } else {
                    $('#jenis').empty().append('<option selected>Pilih Jenis Barang</option>');
                    $('#harga').text('-').data('harga', 0);
                    $('#result').text('Total: Rp. 0');
                }
            });

            $('#jenis').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var harga = parseFloat(selectedOption.data('harga')) || 0;
                $('#harga').text(harga.toLocaleString()).data('harga', harga);

                // Trigger input event to recalculate the total price
                $('#panjang, #lebar').trigger('input');
            });

            $('#panjang, #lebar').on('input', function() {
                var panjang = parseFloat($('#panjang').val()) || 0;
                var lebar = parseFloat($('#lebar').val()) || 0;
                var harga = parseFloat($('#harga').data('harga')) || 0;
                var result = panjang * lebar * harga;
                $('#result').text(`Total: Rp. ${result.toLocaleString()}`);
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const resultSpan = document.getElementById('result');
            const resultHiddenInput = document.getElementById('result_hidden');

            form.addEventListener('submit', function() {
                resultHiddenInput.value = resultSpan.textContent.replace('Total: Rp. ', '').trim();
            });
        });
    </script>

    {{-- 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const panjangInput = document.getElementById('panjang');
            const lebarInput = document.getElementById('lebar');
            const harga = {{ harga }};
            const resultSpan = document.getElementById('result');

            function calculateResult() {
                const panjang = parseFloat(panjangInput.value) || 0;
                const lebar = parseFloat(lebarInput.value) || 0;
                const result = panjang * lebar * harga;
                resultSpan.textContent = `Total: Rp. ${result.toLocaleString()}`;
            }

            panjangInput.addEventListener('input', calculateResult);
            lebarInput.addEventListener('input', calculateResult);
        });
    </script> --}}
@endsection

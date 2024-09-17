@extends('layouts.layouts')

@section('title', 'Order')

@section('content')

    <div id="order" class="card-order">
        <div class="form-header">
            <div class="header-background">
                <img src="{{ asset('assets/images/panel bgg.jpg') }}" class="form-image">
                <div class="header-overlay">
                    <h2>Buat Pesanan Sekarang</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('order.store') }}" method="POST">
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
                <div class="one-section">
                    <div class="left-section">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="wa" class="form-label">WA</label>
                            <input type="text" class="form-control" id="wa" name="wa" required>
                        </div>
                        <div class="form-group">
                            <label for="provinces" class="form-label">Provinsi</label>
                            <select class="form-control" id="provinces" name="provinces_id" required>
                                <option value="" selected>Pilih Provinsi</option>
                                @foreach ($provinces as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="regency" class="form-label">Kabupaten</label>
                            <select name="regency" id="regencies" class="form-control">
                                <option value="">Pilih Kabupaten</option>
                            </select>
                        </div>
                    </div>

                    <div class="right-section">
                        <div class="form-group">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="" selected>Pilih kategori</option>
                                @foreach ($panel as $p)
                                    <option value="{{ $p->category }}">{{ $p->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type" class="form-label">Panel</label>
                            <select class="form-control" id="type" name="panel_id" required>
                                <option value="" selected>Pilih Jenis Barang</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Harga per Meter</label>
                            <p class="form-control-plaintext" id="price" name="price" data-price="0">-</p>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="length" class="form-label">Panjang</label>
                                <input type="number" class="form-control" id="length" name="length" required>
                            </div>
                            <div class="col">
                                <label for="width" class="form-label">Lebar</label>
                                <input type="number" class="form-control" id="width" name="width" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="two-section">
                    <div class="p-3">
                        <label for="result" id="result" name="result">Total: Rp. 0</label>
                        <input type="hidden" id="result_hidden" name="result">
                        <h6 class="mt-2 mb-0">*Belum termasuk biaya lainnya</h6>
                    </div>
                    <button type="submit" class="btn btn-success mt-3 mb-3">Pesan</button>
                </div>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var category_name = $(this).val();
                if (category_name) {
                    $.ajax({
                        url: '/getType/' + category_name,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#type').empty().append(
                                '<option selected>Pilih Jenis Barang</option>');
                            $.each(data, function(key, item) {
                                $('#type').append('<option value="' + item.id +
                                    '" data-price="' + item.price + '">' + item
                                    .type + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#type').empty().append('<option selected>Pilih Jenis Barang</option>');
                }
            });

            $('#type').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var price = parseFloat(selectedOption.data('price')) || 0;
                $('#price').text(price.toLocaleString()).data('price', price);
                $('#length, #width').trigger('input');
            });

            $('#length, #width').on('input', function() {
                var length = parseFloat($('#length').val()) || 0;
                var width = parseFloat($('#width').val()) || 0;
                var price = parseFloat($('#price').data('price')) || 0;
                var result = length * width * price;
                $('#result').text(`Total: Rp. ${result.toLocaleString('id-ID')}`);
                $('#result_hidden').val(result.toFixed(2));
            });

            $('#provinces').on('change', function() {
                var province_id = $(this).val();
                if (province_id) {
                    $.ajax({
                        url: "{{ route('getRegencies') }}",
                        type: "POST",
                        data: {
                            province_id: province_id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            $('#regencies').empty().append(
                                '<option selected>Pilih Kabupaten</option>');
                            $('#regencies').append(data);
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#regencies').empty().append('<option selected>Pilih Kabupaten</option>');
                }
            });

            $('form').on('submit', function() {
                var total = $('#hasil_hidden').val();
                $('#hasil_hidden').val(parseFloat(total).toFixed(2));
            });
        });
    </script>
@endsection

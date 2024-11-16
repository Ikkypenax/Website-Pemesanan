@extends('layouts.app')

@section('title', 'Add Pesanan')

@section('content')
    <div class="container mt-3">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center py-3">
                <div class="pull-right" style="margin-right: 16px">
                    <a class="btn btn-primary" href="{{ route('orders.index') }}">
                        <i class="bi bi-arrow-left-square"></i>
                    </a>
                </div>
                <h3 class="m-0 font-weight-bold text-primary">Tambah Pesanan</h3>
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

            {{-- Form Create Pesanan --}}
            <div class="card-body">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="wa" class="form-label">WA</label>
                        <input type="text" class="form-control" id="wa" name="wa" required>
                    </div>
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
                        <label for="type" class="form-label">Nama Barang</label>
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

                    <div class="form-group">
                        <div class="col">
                            <label for="result" id="result" name="result" class="ms-3"
                                style="font-size: 14pt">Total: Rp. 0</label>
                            <input type="hidden" id="result_hidden" name="result">
                        </div>
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
                            @foreach ($regency as $reg)
                                <option value="{{ $reg->id }}">Pilih Kabupaten</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    
    <script>
        // Mengambil type berdasarkan kategori
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

            // Mengambil price berdasarkan type, dan menyimpan ke input  
            $('#type').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var price = parseFloat(selectedOption.data('price')) || 0;
                $('#price').text(price.toLocaleString()).data('price', price);
                $('#length, #width').trigger('input');
            });

            // 
            $('#length, #width').on('input', function() {
                var length = parseFloat($('#length').val()) || 0;
                var width = parseFloat($('#width').val()) || 0;
                var price = parseFloat($('#price').data('price')) || 0;
                var result = length * width * price;
                $('#result').text(`Total: Rp. ${result.toLocaleString('id-ID')}`);
                $('#result_hidden').val(result.toFixed(2));
            });

            // Mengambil Kabupaten berdasarkan Provinsi yang dipilih
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
        });
    </script>


@endsection

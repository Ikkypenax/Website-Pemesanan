@extends('layouts.layouts')

@section('title', 'Pemesanan')

@section('content')

    <div id="order" class="reveal card-order">
        <div class="form-header">
            <div class="header-background">
                <img src="{{ asset('assets/images/panel bgg.jpg') }}" class="form-image">
                <div class="header-overlay">
                    <h2>Buat Pesanan Sekarang</h2>
                </div>
            </div>
        </div>

        {{-- Form Pesanan --}}
        {{-- Form Pesanan --}}
        <form id="orderForm" action="{{ route('order.store') }}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ups!</strong> Terjadi kesalahan.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Section Pertama --}}
            {{-- Section Pertama --}}
            <div class="one-section">

                {{-- Section Kiri --}}

                {{-- Section Kiri --}}
                <div class="left-section justify-content-between">
                    <div class="form-group-ord">
                        <label for="name" class="form-label-ord">Nama Lengkap</label>
                        <input type="text" class="form-control-ord" id="name" name="name" required
                            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">
                    </div>
                    <div class="form-group-ord">
                        <label for="wa" class="form-label-ord">No. Whatsapp</label>
                        <input type="text" inputmode="numeric" class="form-control-ord" id="wa" name="wa"
                            required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>
                    <div class="form-group-ord">
                        <label for="provinces" class="form-label-ord">Provinsi</label>
                        <select class="form-control-ord" id="provinces" name="provinces_id" required>
                            <option value="" selected>Pilih Provinsi</option>
                            @foreach ($provinces as $prov)
                                <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group-ord">
                        <label for="regency" class="form-label-ord">Kabupaten</label>
                        <select name="regency" id="regencies" class="form-control-ord">
                            <option value="">Pilih Kabupaten</option>
                        </select>
                    </div>
                </div>

                {{-- Section Kanan --}}
                {{-- Section Kanan --}}
                <div class="right-section">
                    <div class="form-group-ord">
                        <label for="category" class="form-label-ord">Kategori</label>
                        <select class="form-control-ord" id="category" name="category" required>
                            <option value="" selected>Pilih kategori</option>
                            @foreach ($panel as $p)
                                <option value="{{ $p->category }}">{{ $p->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group-ord">
                        <label for="type" class="form-label-ord">Panel</label>
                        <select class="form-control-ord" id="type" name="panel_id" required>
                            <option value="" selected>Pilih Jenis Panel</option>
                        </select>
                    </div>
                    <div class="form-group-ord">
                        <label for="price" class="form-label-ord">Harga per Meter</label>
                        <p class="form-control-plaintext-ord" id="price" name="price" data-price="0">-</p>
                    </div>
                    <div class="form-group-ord row">
                        <div class="col">
                            <label for="length" class="form-label-ord">Panjang</label>
                            <input type="number" class="form-control-ord" id="length" name="length" required>

                        </div>
                        <div class="col">
                            <label for="width" class="form-label-ord">Lebar</label>
                            <input type="number" class="form-control-ord" id="width" name="width" required>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section Kedua --}}
            {{-- Section Kedua --}}
            <div class="two-section">
                <div class="p-3">
                    <label for="result" id="result" name="result">Total: Rp. <span id="resultValue">0</span></label>
                    <input type="hidden" id="result_hidden" name="result">
                    <h6 class="mt-2 mb-0">*Belum termasuk biaya lainnya</h6>
                </div>
                <button type="button" class="btn btn-success mt-3 mb-3" id="openAlertModal">Pesan</button>
            </div>


        </form>
    </div>




    <!-- Modal - Konfrimasi Pesanan -->
    <!-- Modal - Konfrimasi Pesanan -->
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Konfirmasi Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="h4 text-center mb-1">
                                    Detail Pesanan
                                </div>
                                <div class="row">
                                    <table class="table table-bordered border-dark">
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%">
                                                    <strong>Nama:</strong> <span id="alertName"></span>
                                                </td>
                                                <td style="width: 50%">
                                                    <strong>Kategori:</strong> <span id="alertCategory"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50%">
                                                    <strong>WA:</strong> <span id="alertWa"></span>
                                                </td>
                                                <td style="width: 50%">
                                                    <strong>Panel:</strong> <span id="alertPanel"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50%">
                                                    <strong>Provinsi:</strong> <span id="alertProvince"></span>
                                                </td>
                                                <td style="width: 50%">
                                                    <strong>Panjang: </strong> <span id="alertLength"></span> M
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50%">
                                                    <strong>Kabupaten:</strong> <span id="alertRegency"></span>
                                                </td>
                                                <td style="width: 50%">
                                                    <strong>Lebar: </strong> <span id="alertWidth"></span> M
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-center">
                                                    <strong>Total:</strong> Rp. <span id="alertResult"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <strong class="mb-2">*Belum termasuk biaya lainnya</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="confirmOrder">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - Notifikasi Sukses -->
    <!-- Modal - Notifikasi Sukses -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Notifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="checkmark-wrapper">
                    <i class="fas fa-check-circle checkmark"></i>
                </div>
                <div>
                    <strong>{{ session('success') }}</strong>
                </div>
            </div>
            <div class="modal-footer">
                @if (session('order_code'))
                    <a href="{{ route('order.details', ['order_code' => session('order_code')]) }}" class="btn btn-primary">Cek Pesanan</a>
                @else
                    <button class="btn btn-secondary" disabled>Cek Pesanan</button>
                @endif
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {

            // Mengambil kabupaten berdasarkan provinsi yang dipilih
            // Mengambil kabupaten berdasarkan provinsi yang dipilih
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

            // Mengambil Type Berdasarkan Category yang dipilih
            // Mengambil Type Berdasarkan Category yang dipilih
            $('#category').on('change', function() {
                var category_name = $(this).val();
                if (category_name) {
                    $.ajax({
                        url: '/getType/' + category_name,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#type').empty().append(
                                '<option selected>Pilih Jenis Panel</option>');
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
                    $('#type').empty().append('<option selected>Pilih Jenis Panel</option>');
                }
            });

            // Mengambil dan menyimpan price berdasarkan type yang dipilih untuk menghitung ulang melalui input sebagai trigger
            // Mengambil dan menyimpan price berdasarkan type yang dipilih untuk menghitung ulang melalui input sebagai trigger
            $('#type').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var price = parseFloat(selectedOption.data('price')) || 0;
                $('#price').text(price.toLocaleString()).data('price', price);
                $('#length, #width').trigger('input');
            });

            // Menghitung resultValue berdasarkan length, width dan price lalu disimpan pada result_hidden
            // Menghitung resultValue berdasarkan length, width dan price lalu disimpan pada result_hidden
            $('#length, #width').on('input', function() {
                var length = parseFloat($('#length').val()) || 0;
                var width = parseFloat($('#width').val()) || 0;
                var price = parseFloat($('#price').data('price')) || 0;
                var result = length * width * price;
                $('#resultValue').text(result.toLocaleString('id-ID'));
                $('#result_hidden').val(result.toFixed(2));
            });

            // Sebelum form di submit , mengambil hasil_hidden dan memastikan dalam format desimal
            $('form').on('submit', function() {
                var total = $('#result_hidden').val();
                $('#result_hidden').val(parseFloat(total).toFixed(2));
            });
        });
    </script>

    {{-- Menampilkan Modal Sukses --}}
    {{-- Menampilkan Modal Sukses --}}
    <script>
        $(document).ready(function() {
            var successMessage = "{{ session('success') }}";
            if (successMessage) {
                $('#successModal').modal('show');
            }
        });
    </script>

    {{-- Menampilkan Modal - Konfirmasi Pesanan --}}
    {{-- Menampilkan Modal - Konfirmasi Pesanan --}}
    <script>
        document.getElementById('openAlertModal').addEventListener('click', function() {
            document.getElementById('alertName').textContent = document.getElementById('name').value;
            document.getElementById('alertWa').textContent = document.getElementById('wa').value;
            document.getElementById('alertProvince').textContent = document.getElementById('provinces').options[
                document.getElementById('provinces').selectedIndex].text;
            document.getElementById('alertRegency').textContent = document.getElementById('regencies').options[
                document.getElementById('regencies').selectedIndex]?.text || 'N/A';
            document.getElementById('alertCategory').textContent = document.getElementById('category').options[
                document.getElementById('category').selectedIndex].text;
            document.getElementById('alertPanel').textContent = document.getElementById('type').options[document
                .getElementById('type').selectedIndex].text;
            document.getElementById('alertLength').textContent = document.getElementById('length').value;
            document.getElementById('alertWidth').textContent = document.getElementById('width').value;
            var totalResult = $('#resultValue').text();
            document.getElementById('alertResult').textContent = totalResult;

            $('#alertModal').modal('show');
        });

        document.getElementById('confirmOrder').addEventListener('click', function(e) {
            e.preventDefault();
            $('#alertModal').modal('hide');
            document.getElementById('orderForm').submit();
        });
    </script>

@endsection

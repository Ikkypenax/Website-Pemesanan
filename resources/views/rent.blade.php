@extends('layouts.layouts')

@section('title', 'Penyewaan')

@section('content')

    <div id="order" class="reveal card-order">
        <div class="form-header">
            <div class="header-background">
                <img src="{{ asset('assets/images/panel bgg.jpg') }}" class="form-image">
                <div class="header-overlay">
                    <h2>Sewa Videotron Sekarang</h2>
                </div>
            </div>
        </div>

        {{-- Form Pesanan --}}
        <form id="orderForm" action="{{ route('rent.store') }}" method="POST">
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
            <div class="one-section">
                {{-- Section Kiri --}}
                <div class="left-section justify-content-between">
                    <div class="form-group-ord">
                        <label for="nama" class="form-label-ord">Nama Lengkap</label>
                        <input type="text" class="form-control-ord" id="nama" name="nama"
                            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');" required>
                        <span id="namaError" class="error-message" style="color: red;"></span>
                    </div>
                    <div class="form-group-ord">
                        <label for="wa" class="form-label-ord">No. Whatsapp</label>
                        <input type="text" inputmode="numeric" class="form-control-ord" id="wa" name="wa"
                            required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        <span id="waError" class="error-message" style="color: red;"></span>
                    </div>
                    <div class="form-group-ord row">
                        <div class="col">
                            <label for="tgl_sewa" class="form-label-ord">Tanggal Sewa</label>
                            <input type="date" class="form-control-ord" id="tgl_sewa" name="tgl_sewa" required>
                            <span id="tgl_sewaError" class="error-message" style="color: red;"></span>
                        </div>
                        <div class="col">
                            <label for="mulai" class="form-label-ord">Mulai</label>
                            <input type="time" class="form-control-ord" id="mulai" name="mulai" required>
                            <span id="mulaiError" class="error-message" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="form-group-ord row">
                        <div class="col">
                            <label for="tgl_selesai" class="form-label-ord">Tanggal Selesai</label>
                            <input type="date" class="form-control-ord" id="tgl_selesai" name="tgl_selesai" required>
                            <span id="tgl_selesaiError" class="error-message" style="color: red;"></span>
                        </div>
                        <div class="col">
                            <label for="selesai" class="form-label-ord">Selesai</label>
                            <input type="time" class="form-control-ord" id="selesai" name="selesai" required>
                            <span id="selesaiError" class="error-message" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="form-group-ord">
                        <label for="provinces" class="form-label-ord">Provinsi</label>
                        <select class="form-control-ord" id="provinces" name="provinces_id" required>
                            <option value="" selected>Pilih Provinsi</option>
                            @foreach ($provinces as $prov)
                                <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                            @endforeach
                        </select>
                        <span id="provinceError" class="error-message" style="color: red;"></span>
                    </div>
                    <div class="form-group-ord">
                        <label for="regency" class="form-label-ord">Kabupaten</label>
                        <select name="kabupaten" id="regencies" class="form-control-ord">
                            <option value="">Pilih Kabupaten</option>
                        </select>
                        <span id="regencyError" class="error-message" style="color: red;"></span>
                    </div>
                    <div class="form-group-ord">
                        <label for="keterangan" class="form-label-ord">Keterangan</label>
                        <textarea class="form-control-ord" id="keterangan" name="keterangan"></textarea>
                        <span id="keteranganError" class="error-message" style="color: red;"></span>
                    </div>

                </div>

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
                        <span id="categoryError" class="error-message" style="color: red;"></span>
                    </div>
                    <div class="form-group-ord">
                        <label for="type" class="form-label-ord">Panel</label>
                        <select class="form-control-ord" id="type" name="panel_id" required>
                            <option value="" selected>Pilih Jenis Panel</option>
                        </select>
                        <span id="typeError" class="error-message" style="color: red;"></span>
                    </div>
                    <div class="form-group-ord">
                        <label for="rental" class="form-label-ord">Harga per Meter</label>
                        <p class="form-control-plaintext-ord" id="rental" name="rental" data-rental="0">-
                        </p>
                        <span id="rentalError" class="error-message" style="color: red;"></span>
                    </div>
                    <div class="form-group-ord row">
                        <div class="col">
                            <label for="panjang" class="form-label-ord">Panjang</label>
                            <input type="number" class="form-control-ord" id="panjang" name="panjang" required>
                            <span id="panjangError" class="error-message" style="color: red;"></span>
                        </div>
                        <div class="col">
                            <label for="lebar" class="form-label-ord">Lebar</label>
                            <input type="number" class="form-control-ord" id="lebar" name="lebar" required>
                            <span id="lebarError" class="error-message" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="form-group-ord row">
                        <div class="col">
                            <label for="level" class="form-label-ord">Level</label>
                            <input type="number" class="form-control-ord" step="0.01" id="level" name="level"
                                required>
                            <span id="levelError" class="error-message" style="color: red;"></span>
                        </div>
                        <div class="col">
                            <label for="genset" class="form-label-ord">Support Genset</label>
                            <input type="checkbox" class="custom-checkbox" id="genset" name="genset"
                                value="1">
                        </div>
                    </div>

                </div>
            </div>

            {{-- Section Kedua --}}
            <div class="two-section">
                <div class="p-3">
                    <label for="total" id="total" name="total">Total: Rp. <span
                            id="totalValue">0</span></label>
                    <input type="hidden" id="total_hidden" name="total">
                    <h6 class="mt-2 mb-0">*Belum termasuk biaya lainnya</h6>
                    {{-- <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}"> --}}
                </div>
                <button type="button" class="btn btn-success mt-3 mb-3" id="openAlertModal">Pesan</button>
            </div>

        </form>

    </div>

    <!-- Modal - Konfrimasi Pesanan -->
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Konfirmasi Sewa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="h4 text-center mb-1">
                                    Detail Sewa
                                </div>
                                <div class="row">
                                    <table class="table table-bordered border-dark">
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%">
                                                    <strong>Tanggal:</strong> <span id="alertTgl_sewa"></span> s/d <span
                                                        id="alertTgl_selesai"></span>
                                                </td>
                                                <td style="width: 50%">
                                                    <strong>Waktu:</strong> <span id="alertMulai"></span> s/d <span
                                                        id="alertSelesai"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50%">
                                                    <strong>Nama:</strong> <span id="alertNama"></span>
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
                                                    <strong>Panjang: </strong> <span id="alertPanjang"></span> M
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50%">
                                                    <strong>Kabupaten:</strong> <span id="alertRegency"></span>
                                                </td>
                                                <td style="width: 50%">
                                                    <strong>Lebar: </strong> <span id="alertLebar"></span> M
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50%">
                                                    <strong>Support Genset:</strong> <span id="alertGenset"></span>
                                                </td>
                                                <td style="width: 50%">
                                                    <strong>Level: </strong> <span id="alertLevel"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-left">
                                                    <strong>Keterangan:</strong> <span id="alertKeterangan"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-left">
                                                    <strong>Total:</strong> Rp. <span id="alertTotal"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <strong class="mb-2">*Belum termasuk biaya lainnya</strong>
                                </div>
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
                    @if (session('rent_code'))
                        <a href="{{ route('order.details', ['type' => 'rent', 'code' => session('rent_code')]) }}"
                            class="btn btn-primary" onclick="copyOrderCode()">Salin & Cek Pesanan</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            // Mengambil kabupaten berdasarkan provinsi yang dipilih
            $('#provinces').on('change', function() {
                var province_id = $(this).val();
                if (province_id) {
                    $.ajax({
                        url: "{{ route('getRegencis') }}",
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

            // Mengambil type berdasarkan kategori yang dipilih
            $('#category').on('change', function() {
                var category_name = $(this).val();
                if (category_name) {
                    $.ajax({
                        url: '/getPanel/' + category_name,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#type').empty().append(
                                '<option selected>Pilih Jenis Panel</option>');
                            $.each(data, function(key, item) {
                                $('#type').append('<option value="' + item.id +
                                    '" data-rental="' + item.rental +
                                    '">' + item.type + '</option>');
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

            // Menyimpan rental berdasarkan type yang dipilih
            $('#type').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var rental = parseFloat(selectedOption.data('rental')) || 0;
                $('#rental').text(rental.toLocaleString()).data('rental', rental);
                hitungTotal();
            });

            // Menghitung total biaya berdasarkan panjang, lebar, rental, dan durasi
            $('#panjang, #lebar, #tgl_sewa, #mulai, #tgl_selesai, #selesai').on('input change', function() {
                hitungTotal();
            });

            function hitungTotal() {
                var panjang = parseFloat($('#panjang').val()) || 0;
                var lebar = parseFloat($('#lebar').val()) || 0;
                var rental = parseFloat($('#rental').data('rental')) || 0;
                var ukuran = panjang * lebar; // Luas area

                var tglSewa = $('#tgl_sewa').val();
                var mulai = $('#mulai').val();
                var tglSelesai = $('#tgl_selesai').val();
                var selesai = $('#selesai').val();

                if (tglSewa && mulai && tglSelesai && selesai) {
                    var mulaiDate = new Date(`${tglSewa}T${mulai}:00`);
                    var selesaiDate = new Date(`${tglSelesai}T${selesai}:00`);
                    var durasiJam = (selesaiDate - mulaiDate) / (1000 * 60 * 60);

                    // Validasi durasi waktu
                    if (durasiJam <= 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan',
                            text: 'Tanggal dan waktu selesai harus lebih 12 Jam dari waktu mulai.',
                        });
                        $('#totalValue').text("0");
                        $('#total_hidden').val("0.00");
                        return;
                    }

                    // Hitung kelipatan 12 jam
                    var kelipatan12 = Math.ceil(durasiJam / 12);

                    // Hitung total biaya
                    var total = ukuran * rental * kelipatan12;

                    // Tampilkan hasil
                    $('#totalValue').text(total.toLocaleString('id-ID'));
                    $('#total_hidden').val(total.toFixed(2));

                    console.log("Durasi (jam):", durasiJam);
                    console.log("Kelipatan 12:", kelipatan12);
                    console.log("Total:", total);
                } else {
                    $('#totalValue').text("0");
                    $('#total_hidden').val("0.00");
                }
            }


            // Validasi sebelum submit
            $('form').on('submit', function() {
                var total = $('#total_hidden').val();
                $('#total_hidden').val(parseFloat(total).toFixed(2));
            });
        });
    </script>

    {{-- Menampilkan Modal - Konfirmasi Pesanan --}}
    <script>
        document.getElementById('openAlertModal').addEventListener('click', function() {
            let isValid = true; // Flag untuk validasi
            const nama = document.getElementById('nama').value.trim();
            const wa = document.getElementById('wa').value.trim();
            const tgl_sewa = document.getElementById('tgl_sewa').value.trim();
            const tgl_selesai = document.getElementById('tgl_selesai').value.trim();
            const mulai = document.getElementById('mulai').value.trim();
            const selesai = document.getElementById('selesai').value.trim();
            const provinces = document.getElementById('provinces').selectedIndex;
            const regencies = document.getElementById('regencies').selectedIndex;
            const keterangan = document.getElementById('keterangan').value.trim();
            const category = document.getElementById('category').selectedIndex;
            const type = document.getElementById('type').selectedIndex;
            const panjang = document.getElementById('panjang').value.trim();
            const lebar = document.getElementById('lebar').value.trim();
            const level = document.getElementById('level').value.trim();
            const genset = document.getElementById('genset').checked;

            // Reset error messages
            document.querySelectorAll('.error-message').forEach(function(el) {
                el.textContent = '';
            });

            // Validasi setiap input
            if (!nama) {
                isValid = false;
                document.getElementById('namaError').textContent = 'Nama tidak boleh kosong.';
            }
            if (!wa) {
                isValid = false;
                document.getElementById('waError').textContent = 'Nomor WA tidak boleh kosong.';
            }
            if (!mulai) {
                isValid = false;
                document.getElementById('mulaiError').textContent = 'Pilih waktu mulai.';
            }
            if (!selesai) {
                isValid = false;
                document.getElementById('selesaiError').textContent = 'Pilih waktu selesai.';
            }
            if (!tgl_sewa) {
                isValid = false;
                document.getElementById('tgl_sewaError').textContent = 'Pilih tanggal sewa.';
            }
            if (!tgl_selesai) {
                isValid = false;
                document.getElementById('tgl_selesaiError').textContent = 'Pilih tanggal selesai.';
            }
            if (provinces <= 0) {
                isValid = false;
                document.getElementById('provinceError').textContent = 'Pilih provinsi.';
            }
            if (regencies <= 0) {
                isValid = false;
                document.getElementById('regencyError').textContent = 'Pilih kabupaten/kota.';
            }
            if (category <= 0) {
                isValid = false;
                document.getElementById('categoryError').textContent = 'Pilih kategori.';
            }
            if (type <= 0) {
                isValid = false;
                document.getElementById('typeError').textContent = 'Pilih tipe.';
            }
            if (!panjang) {
                isValid = false;
                document.getElementById('panjangError').textContent = 'Panjang tidak boleh kosong.';
            }
            if (!lebar) {
                isValid = false;
                document.getElementById('lebarError').textContent = 'Lebar tidak boleh kosong.';
            }
            if (!keterangan) {
                isValid = false;
                document.getElementById('keteranganError').textContent = 'Keterangan tidak boleh kosong.';
            }
            if (!level) {
                isValid = false;
                document.getElementById('levelError').textContent = 'Level tidak boleh kosong.';
            }

            // Jika form kosong, tampilkan peringatan
            if (!isValid) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Data Tidak Lengkap',
                    text: 'Harap lengkapi semua data yang diperlukan sebelum melanjutkan!',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#d33',
                    background: '#fffbe6',
                    customClass: {
                        title: 'my-title',
                        popup: 'my-popup'
                    }
                });
                return;
            }

            // Jika valid, tampilkan modal konfirmasi
            document.getElementById('alertNama').textContent = nama;
            document.getElementById('alertWa').textContent = wa;
            document.getElementById('alertProvince').textContent = document.getElementById('provinces').options[
                provinces].text;
            document.getElementById('alertRegency').textContent = regencies > 0 ? document.getElementById(
                'regencies').options[regencies].text : 'N/A';
            document.getElementById('alertCategory').textContent = document.getElementById('category').options[
                category].text;
            document.getElementById('alertPanel').textContent = document.getElementById('type').options[type].text;
            document.getElementById('alertPanjang').textContent = panjang;
            document.getElementById('alertLebar').textContent = lebar;
            document.getElementById('alertTgl_sewa').textContent = tgl_sewa;
            document.getElementById('alertTgl_selesai').textContent = tgl_selesai;
            document.getElementById('alertMulai').textContent = mulai;
            document.getElementById('alertSelesai').textContent = selesai;
            document.getElementById('alertKeterangan').textContent = keterangan;
            document.getElementById('alertGenset').textContent = genset ? 'Ya' : 'Tidak';
            document.getElementById('alertLevel').textContent = level;
            var totalTotal = $('#totalValue').text();
            document.getElementById('alertTotal').textContent = totalTotal;

            // Tampilkan modal konfirmasi
            $('#alertModal').modal('show');
        });

        document.getElementById('confirmOrder').addEventListener('click', function(e) {
            e.preventDefault();
            $('#alertModal').modal('hide');
            document.getElementById('orderForm').submit();
        });
    </script>

    <script>
        $(document).ready(function() {
            var successMessage = "{{ session('success') }}";
            if (successMessage) {
                $('#successModal').modal('show');
            }
        });
    </script>

    <script>
        function copyOrderCode() {
            var rentCode = '{{ session('rent_code') }}'; // Ambil kode pesanan dari session
            navigator.clipboard.writeText(rentCode).then(function() {
                alert("Kode pesanan telah disalin: " + rentCode);
            }).catch(function(err) {
                alert("Gagal menyalin kode pesanan: " + err);
            });
        }
    </script>

@endsection

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
                        <span>{{ $lokasi->nama }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Wa:</strong>
                        <span>{{ $lokasi->wa }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kategori:</strong>
                        <span>{{ $lokasi->kategori }}</span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jenis:</strong>
                        <span>{{ $lokasi->hargaPerMeter ? $lokasi->hargaPerMeter->jenis : 'No Jenis' }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <span class="ms-3">Harga per Meter</span>
                        <p class="form-control-plaintext" id="harga" name="harga"
                            data-harga="{{ $lokasi->hargaPerMeter ? $lokasi->hargaPerMeter->harga : 0 }}">
                            {{ $lokasi->hargaPerMeter ? $lokasi->hargaPerMeter->harga : 'Rp. 0' }}</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Panjang:</strong>
                        <span id="panjang">{{ $lokasi->panjang }}</span> meter
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lebar:</strong>
                        <span id="lebar">{{ $lokasi->lebar }}</span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <span class="ms-3">Total:</span>
                        {{-- <span for="result" id="result" name="result" class="ms-3">{{ $lokasi->result }}</span> --}}
                        <p for="result" id="result" name="result" class="form-control-plaintext">
                            {{ $lokasi->result }}</p>
                        <input type="hidden" id="result_hidden" name="result">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Provinsi:</strong>
                        <span>{{ $lokasi->provinsi }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kabupaten:</strong>
                        <span>{{ $lokasi->kabupaten }}</span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                    </button>
                </div>
            </div>
        </form>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <span class="ms-3">Harga per Meter</span>
                            <p class="form-control-plaintext" id="harga" name="harga"
                            data-harga="{{ $lokasi->hargaPerMeter ? $lokasi->hargaPerMeter->harga : 0 }}">
                            {{ $lokasi->hargaPerMeter ? $lokasi->hargaPerMeter->harga : 'Rp. 0' }}</p>
                            
                            <span class="ms-3">Total</span>
                            <p for="result" id="result" name="result" class="form-control-plaintext">
                                {{ $lokasi->result }}</p>
                            <input type="hidden" id="result_hidden" name="result">

                            <div>
                                <label for="biaya_transportasi">Biaya Transportasi:</label>
                                <input type="number" name="biaya_transportasi" id="biaya_transportasi">
                            </div>
                            <div>
                                <label for="biaya_pemasangan">Biaya Pemasangan:</label>
                                <input type="number" name="biaya_pemasangan" id="biaya_pemasangan">
                            </div>
                            <div>
                                <label for="biaya_jasa">Biaya Jasa:</label>
                                <input type="number" name="biaya_jasa" id="biaya_jasa">
                            </div>
                            <div>
                                <label for="biaya_service">Biaya Service:</label>
                                <input type="number" name="biaya_service" id="biaya_service">
                            </div>
                            <span class="ms-3">Total Keseluruhan</span>
                            <p for="result" id="result" name="result" class="form-control-plaintext">
                                {{ "" }}</p>
                            <input type="hidden" id="result_hidden" name="result">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

    </div>

    {{-- <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <span>{{ $lokasi->nama }}</span>
                <input type="text" name="nama" value="{{ $lokasi->nama }}" class="form-control"
                    placeholder="nama">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Wa:</strong>
                <span>{{ $lokasi->wa }}</span>
                <input type="text" name="wa" value="{{ $lokasi->wa }}" class="form-control"
                    placeholder="wa">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori:</strong>
                <span>{{ $lokasi->kategori }}</span>
                <input type="text" name="kategori" value="{{ $lokasi->kategori }}" class="form-control"
                    placeholder="kategori">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis:</strong>
                <span>{{ $lokasi->jenis }}</span>
                <span>{{ $lokasi->hargaPerMeter ? $lokasi->hargaPerMeter->jenis : 'No Jenis' }}</span>
                <input type="text" name="jenis" value="{{ $lokasi->jenis }}" class="form-control"
                    placeholder="jenis">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="harga" class="form-label">Harga per Meter</label>
                <span for="harga" id="harga" name="harga" class="ms-3">Harga per Meter</span>
                <p class="form-control-plaintext" id="harga" name="harga" data-harga="0">
                    {{ $lokasi->hargaPerMeter ? $lokasi->hargaPerMeter->harga : 'Rp. 0' }}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Panjang:</strong>
                <span>{{ $lokasi->panjang }} meter</span>
                <input type="text" name="panjang" value="{{ $lokasi->panjang }}" class="form-control"
                    placeholder="panjang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lebar:</strong>
                <span>{{ $lokasi->lebar }}</span>
                <input type="text" name="lebar" value="{{ $lokasi->lebar }}" class="form-control"
                    placeholder="lebar">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span for="result" id="result" name="result" class="ms-3">{{ $lokasi->result }}</span>
                <input type="hidden" id="result_hidden" name="result">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Provinsi:</strong>
                <span>{{ $lokasi->provinsi }}</span>
                <input type="text" name="provinsi" value="{{ $lokasi->provinsi }}" class="form-control"
                    placeholder="Provinsi">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kabupaten:</strong>
                <span>{{ $lokasi->kabupaten }}</span>
                <input type="text" name="kabupaten" value="{{ $lokasi->kabupaten }}" class="form-control"
                    placeholder="Kabupaten">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div> --}}



    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            function calculateResult() {
                const panjang = parseFloat(document.getElementById('panjang').textContent) || 0;
                const lebar = parseFloat(document.getElementById('lebar').textContent) || 0;
                const harga = parseFloat(document.getElementById('harga').getAttribute('data-harga')) || 0;

                const result = panjang * lebar * harga;
                document.getElementById('result').textContent = result;
                document.getElementById('result_hidden').value = result;
            }

            // Initialize result on page load
            calculateResult();
        });
    </script>


@endsection

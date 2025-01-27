@extends('layouts.app')

@section('title', 'Detail Sewa')

@section('content')
    <div class="container mt-3">

        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center py-3">
                <div class="pull-right" style="margin-right: 16px">
                    <a class="btn btn-primary" href="{{ route('rent.index') }}">
                        <i class="bi bi-arrow-left-square"></i>
                    </a>
                </div>
                <h3 class="m-0 font-weight-bold text-primary">Detail Sewa</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    {{-- Tabel Detail informasi Pesanan --}}
                    <div class="table-container gap-0">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th colspan="4" class="text-center" style="font-size: 16pt;">Informasi Sewa</th>
                                </tr>
                                <tr>
                                    <th colspan="1" class="text-center" style="font-size: 12pt;">Tanggal Sewa</th>
                                    <th colspan="3" class="text-left" style="font-size: 12pt;">
                                        {{ \Carbon\Carbon::parse($rent->tgl_sewa)->format('d-m-Y') }} s/d
                                        {{ \Carbon\Carbon::parse($rent->tgl_selesai)->format('d-m-Y') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="width: 25%;">Nama</th>
                                    <td>{{ $rent->nama }}</td>
                                    <th style="width: 25%;">Waktu Sewa</th>
                                    <td>{{ \Carbon\Carbon::parse($rent->mulai)->format('H:i') }} s/d
                                        {{ \Carbon\Carbon::parse($rent->selesai)->format('H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>No Hp</th>
                                    <td>{{ $rent->wa }}</td>
                                    <th>Kategori</th>
                                    <td>{{ $rent->panel->category }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Panel</th>
                                    <td>{{ $rent->panel->type }}</td>
                                    <th>Ukuran</th>
                                    <td>{{ intval($rent->panjang ?? 0) }} x {{ intval($rent->lebar ?? 0) }} Meter</td>
                                </tr>
                                <tr>
                                    <th>Harga Per Meter</th>
                                    <td>Rp. {{ number_format($rent->panel->rental, 0, ',', '.') }}</td>
                                    <th>Harga Sewa</th>
                                    <td>Rp. {{ number_format($rent->total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- Tabel Biaya (Tabel Kedua) --}}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="4" class="text-center" style="font-size: 16pt;">Biaya Tambahan</th>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center" style="font-size: 12pt;">Support Genset</th>
                                    @if ($rent->genset == 1)
                                        <th colspan="2" class="text-left" style="font-size: 12pt;">IYA</th>
                                    @elseif ($rent->genset == 0)
                                        <th colspan="2" class="text-left" style="font-size: 12pt;">TIDAK</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="width: 25%;">Biaya Transportasi</th>
                                    <td>
                                        @isset($rent->feerent->fee_transport)
                                            Rp. {{ number_format($rent->feerent->fee_transport, 0, ',', '.') }}
                                        @else
                                            -
                                        @endisset
                                    </td>
                                    <th>Biaya Pemasangan</th>
                                    <td>
                                        @isset($rent->feerent->fee_install)
                                            Rp. {{ number_format($rent->feerent->fee_install, 0, ',', '.') }}
                                        @else
                                            -
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <th>Biaya Jasa</th>
                                    <td>
                                        @isset($rent->feerent->fee_service)
                                            Rp. {{ number_format($rent->feerent->fee_service, 0, ',', '.') }}
                                        @else
                                            -
                                        @endisset
                                    </td>
                                    <th>Biaya Service</th>
                                    <td>
                                        @isset($rent->feerent->fee_repair)
                                            Rp. {{ number_format($rent->feerent->fee_repair, 0, ',', '.') }}
                                        @else
                                            -
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <th>Biaya Pendukung</th>
                                    <td>
                                        @isset($rent->feerent->fee_support)
                                            Rp. {{ number_format($rent->feerent->fee_support, 0, ',', '.') }}
                                        @else
                                            -
                                        @endisset
                                    </td>
                                    <th>Biaya Keseluruhan</th>
                                    <td>
                                        @isset($rent->feerent->fee_total)
                                            Rp. {{ number_format($rent->feerent->fee_total, 0, ',', '.') }}
                                        @else
                                            -
                                        @endisset
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <a class="btn btn-success" href="{{ route('rent.sendInvoice', $rent->id) }}">
                            <i class="bi bi-whatsapp"></i> Kirim Invoice ke WhatsApp
                        </a>
                        <a class="btn btn-warning"
                            href="{{ route('admin.rent.printInvoice', ['id' => $rent->id, 'name' => $rent->panel->id]) }}">
                            <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                        </a>
                        <a class="btn btn-primary" href="{{ route('rent.waInvoice', $rent->id) }}">
                            <i class="bi bi-whatsapp"></i> Kirim Pdf Invoice ke WhatsApp
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.app')

@section('title', 'List Sewa')

@section('content')

    <div class="container-fluid">
        <!-- Success Message -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3 mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Daftar Sewa</h3>
            </div>

            @if ($rent->isEmpty())
                <p class="text-center text-muted">Tidak ada pesanan yang tersedia.</p>
            @else
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="myTableRent" class="table table-rent table-bordered border-dark table-hover" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr class="table-secondary align-top">
                                    <th>No</th>
                                    <th>Kode Pesanan</th>
                                    <th>Nama</th>
                                    <th>Wa</th>
                                    <th>Jenis</th>
                                    {{-- <th>P x L</th> --}}
                                    <th>Support Genset</th>
                                    <th>Tanggal</th>
                                    {{-- <th>Jam</th> --}}
                                    <th>Kabupaten</th>
                                    <th>Harga Sewa</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rent as $ren)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ren->rent_code }}</td>
                                        <td>{{ $ren->nama }}</td>
                                        <td>{{ $ren->wa }}</td>
                                        {{-- <td>{{ $ord->panel->category ?? 'kosong' }}</td> --}}
                                        <td>{{ $ren->panel->type ?? 'kosong' }}</td>
                                        {{-- <td>{{ intval($ren->panjang) }} x {{ intval($ren->lebar) }}</td> --}}
                                        @if ($ren->genset == 1)
                                            <td>IYA</td>
                                        @elseif ($ren->genset == 0)
                                            <td>TIDAK</td>
                                        @endif

                                        {{-- <td>{{ $ren->tgl_sewa }} sampai {{ $ren->tgl_selesai }}</td> --}}
                                        <td>{{ \Carbon\Carbon::parse($ren->tgl_sewa)->format('d-m-Y') }} s/d 
                                             {{ \Carbon\Carbon::parse($ren->tgl_selesai)->format('d-m-Y') }}</td>

                                        {{-- <td>{{ $ren->mulai }}-{{ $ren->selesai }}</td> --}}
                                        {{-- <td>{{ $ord->provinces->name ?? 'kosong' }}</td> --}}
                                        <td>{{ $ren->kabupaten ?? 'kosong' }}</td>

                                        <td>
                                            {{ $ren->total ? 'Rp. ' . number_format($ren->total, 0, ',', '.') : 'Rp. 0' }}
                                        </td>

                                        <td>
                                            {{ isset($ren->feerent->fee_total) ? 'Rp. ' . number_format($ren->feerent->fee_total, 0, ',', '.') : 'Rp. 0' }}
                                        </td>


                                        <td>
                                            <form action="{{ route('rent.status', $ren->id) }}" method="POST"
                                                id="status-form-{{ $ren->id }}">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-control" style="width: 100px;"
                                                    onchange="checkAdditionalFee({{ $ren->id }}, {{ $ren->feerent ? 'true' : 'false' }});"
                                                    id="status-select-{{ $ren->id }}">
                                                    @foreach ($ren->getStatusOptions() as $value => $label)
                                                        <option value="{{ $value }}"
                                                            class="status-{{ strtolower($value) }}"
                                                            {{ $ren->status == $value ? 'selected' : '' }}>
                                                            {{ $label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                        {{-- <div class="modal fade" id="warningModal-{{ $ren->id }}" tabindex="-1"
                                            aria-labelledby="warningLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="warningLabel">Peringatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Anda harus menambahkan biaya tambahan terlebih dahulu sebelum
                                                        mengubah
                                                        status pesanan.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}


                                        <td>
                                            {{-- Button Action --}}
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item mb-1 mr-0">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('rent.edit', $ren->id) }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item mb-1 mr-0">
                                                    <a class="btn btn-secondary btn-sm"
                                                        href="{{ route('rent.show', $ren->id) }}">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $ren->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </li>
                                            </ul>

                                        </td>
                                    </tr>

                                    {{-- Modal Delete Pesanan --}}
                                    <div class="modal fade" id="deleteModal{{ $ren->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Alert !!!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('rent.destroy', $ren->id) }}" method="POST"
                                                        class="action-buttons">
                                                        @csrf
                                                        @method('DELETE')
                                                        <p>Apakah anda yakin ingin menghapus pesanan
                                                            <strong>{{ $ren->nama }}</strong> ?
                                                        </p>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Back</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if (!$rent->isEmpty())
        <script>
            function checkAdditionalFee(rentId, hasAdditionalFee) {
                const selectElement = document.getElementById(`status-select-${rentId}`);
                if (!selectElement) return; // Jika elemen tidak ditemukan, hentikan fungsi

                const selectedValue = selectElement.value;

                // Daftar status yang memerlukan biaya tambahan
                const restrictedStatuses = ['Approve', 'Finish'];

                // Mengecek apakah biaya tambahan sudah ada
                if (!hasAdditionalFee && restrictedStatuses.includes(selectedValue)) {
                    const modalId = `#warningModal-${rentId}`;
                    $(modalId).modal('show');
                    selectElement.value = "{{ isset($ren) ? $ren->status : '' }}"; // Pastikan nilai sebelumnya di-set ulang
                } else {
                    const formElement = document.getElementById(`status-form-${rentId}`);
                    if (formElement) {
                        formElement.submit();
                    }
                }
            }
        </script>
    @endif

@endsection

@extends('layouts.app')

@section('title', 'List Pesanan')

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
                <h3 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h3>
            </div>

            @if ($order->isEmpty())
                <p class="text-center text-muted">Tidak ada pesanan yang tersedia.</p>
            @else
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-bordered border-dark table-hover table-orders w-auto" id="myTable"
                            cellspacing="0" style="table-layout: auto">
                            <thead>
                                <tr class="table-secondary">
                                    <!-- Kolom Tabel -->
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Wa</th>
                                    <th>Jenis</th>
                                    <th>P x L</th>
                                    <th>Harga Per Meter</th>
                                    <th>Kabupaten</th>
                                    <th>Harga Barang</th>
                                    <th>Total</th>
                                    <th>Kode Pesanan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $ord)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ord->name }}</td>
                                        <td>{{ $ord->wa }}</td>
                                        {{-- <td>{{ $ord->panel->category ?? 'kosong' }}</td> --}}
                                        <td>{{ $ord->panel->type ?? 'kosong' }}</td>
                                        <td>{{ intval($ord->length) }} x {{ intval($ord->width) }}</td>
                                        <td>{{ $ord->panel->price ? 'Rp. ' . number_format($ord->panel->price, 0, ',', '.') : 'Rp. 0' }}
                                        </td>
                                        {{-- <td>{{ $ord->provinces->name ?? 'kosong' }}</td> --}}
                                        <td>{{ $ord->regency ?? 'kosong' }}</td>

                                        <td>
                                            {{ $ord->result ? 'Rp. ' . number_format($ord->result, 0, ',', '.') : 'Rp. 0' }}
                                        </td>

                                        <td>
                                            {{ isset($ord->addfee->fee_total) ? 'Rp. ' . number_format($ord->addfee->fee_total, 0, ',', '.') : 'Rp. 0' }}
                                        </td>
                                        <td>{{ $ord->order_code }}</td>

                                        <td>
                                            <form action="{{ route('orders.status', $ord->id) }}" method="POST"
                                                id="status-form-{{ $ord->id }}">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-control" style="width: 100px;"
                                                    onchange="checkAdditionalFee({{ $ord->id }}, {{ $ord->addfee ? 'true' : 'false' }});"
                                                    id="status-select-{{ $ord->id }}">
                                                    <option value="Prosses" class="status-prosses"
                                                        {{ $ord->status == 'Prosses' ? 'selected' : '' }}>Prosses</option>
                                                    <option value="Approve" class="status-approve"
                                                        {{ $ord->status == 'Approve' ? 'selected' : '' }}>Approve</option>
                                                    <option value="Reject" class="status-reject"
                                                        {{ $ord->status == 'Reject' ? 'selected' : '' }}>Reject</option>
                                                    <option value="Finish" class="status-finish"
                                                        {{ $ord->status == 'Finish' ? 'selected' : '' }}>Finish</option>
                                                </select>
                                            </form>
                                        </td>
                                        <div class="modal fade" id="warningModal-{{ $ord->id }}" tabindex="-1"
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
                                        </div>


                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item mb-1 mr-0">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('orders.edit', $ord->id) }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item mb-1 mr-0">
                                                    <a class="btn btn-secondary btn-sm"
                                                        href="{{ route('orders.show', $ord->id) }}">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $ord->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </li>
                                            </ul>

                                        </td>
                                    </tr>

                                    {{-- Modal Delete Pesanan --}}
                                    <div class="modal fade" id="deleteModal{{ $ord->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Alert !!!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('orders.destroy', $ord->id) }}" method="POST"
                                                        class="action-buttons">
                                                        @csrf
                                                        @method('DELETE')
                                                        <p>Apakah anda yakin ingin menghapus pesanan
                                                            <strong>{{ $ord->name }}</strong> ?
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

    @if (!$order->isEmpty())
        <script>
            function checkAdditionalFee(orderId, hasAdditionalFee) {
                const selectElement = document.getElementById(`status-select-${orderId}`);
                if (!selectElement) return; // Jika elemen tidak ditemukan, hentikan fungsi

                const selectedValue = selectElement.value;

                // Daftar status yang memerlukan biaya tambahan
                const restrictedStatuses = ['Approve', 'Finish'];

                if (!hasAdditionalFee && restrictedStatuses.includes(selectedValue)) {
                    const modalId = `#warningModal-${orderId}`;
                    $(modalId).modal('show');
                    selectElement.value = "{{ isset($ord) ? $ord->status : '' }}"; // Pastikan nilai sebelumnya di-set ulang
                } else {
                    const formElement = document.getElementById(`status-form-${orderId}`);
                    if (formElement) {
                        formElement.submit();
                    }
                }
            }
        </script>
    @endif
@endsection

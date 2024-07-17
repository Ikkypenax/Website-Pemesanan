@extends('layouts.app')

@section('title', 'List Lokasi')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Lokasi</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('lokasi.create') }}"> Create New Lokasi</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Wa</th>
                <th>Panjang</th>
                <th>Lebar</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Status</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($lokasi as $l)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $l->nama }}</td>
                    <td>{{ $l->wa }}</td>
                    <td>{{ $l->panjang }}</td>
                    <td>{{ $l->lebar }}</td>
                    <td>{{ $l->provinsi }}</td>
                    <td>{{ $l->kabupaten }}</td>
                    <td>
                        {{-- <form action="{{ route('lokasi.status', $l->id) }}" method="POST" id="status-form-{{ $l->id }}">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="updateFormColorAndSubmit(this);">
                                <option value="pending" {{ $l->status == 'pending' ? 'selected' : '' }}>Diproses</option>
                                <option value="approved" {{ $l->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ $l->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </form> --}}

                        <form action="{{ route('lokasi.status', $l->id) }}" method="POST" id="status-form-{{ $l->id }}">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="document.getElementById('status-form-{{ $l->id }}').submit();">
                                <option value="pending" {{ $l->status == 'pending' ? 'selected' : '' }}>Diproses</option>
                                <option value="approved" {{ $l->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ $l->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </form>

                        <script>
                            // Script untuk mengatur warna pada tampilan awal
                            document.addEventListener("DOMContentLoaded", function() {
                                var selectElement = document.querySelector('select[name=status]');
                                var selectedValue = selectElement.value;
                                var selectedOption = selectElement.querySelector('option[value="' + selectedValue + '"]');
                                selectedOption.style.backgroundColor = '#3498db'; // Warna latar belakang saat tampilan awal
                                selectedOption.style.color = '#ffffff'; // Warna teks saat tampilan awal
                            });
                        </script>

                    </td>
                    <td>
                        <form action="{{ route('lokasi.destroy', $l->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('lokasi.show', $l->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('lokasi.edit', $l->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

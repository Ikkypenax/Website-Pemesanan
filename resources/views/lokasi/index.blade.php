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
                <th>Kategori</th>
                <th>Jenis</th>
                <th>P x L</th>
                {{-- <th>Lebar</th> --}}
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Harga</th>
                <th>Status</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($lokasi as $l)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $l->nama }}</td>
                    <td>{{ $l->wa }}</td>
                    <td>{{ $l->kategori }}</td>
                    {{-- <td>{{ $l->kategori ? $l->kategori->nama_kategori : 'No Category' }}</td> --}}
                    <td>{{ $l->hargaPerMeter ? $l->hargaPerMeter->jenis : 'No Jenis' }}</td>
                    <td>{{ $l->panjang }} x {{ $l->lebar }}</td>
                    {{-- <td>{{ $l->lebar }}</td> --}}
                    <td>{{ $l->provinsi }}</td>
                    <td>{{ $l->kabupaten }}</td>
                    <td>{{ $l->result }}</td>
                    <td>

                        <form action="{{ route('lokasi.status', $l->id) }}" method="POST"
                            id="status-form-{{ $l->id }}">
                            @csrf
                            @method('PUT')
                            <select name="status"
                                onchange="document.getElementById('status-form-{{ $l->id }}').submit();"
                                style="background-color: {{ $l->status == 'pending' ? '#f7b731' : ($l->status == 'approved' ? '#20bf6b' : ($l->status == 'rejected' ? '#eb3b5a' : '#ffffff')) }}">
                                <option value="pending" style="background-color: #f7b731; color: #ffffff;"
                                    {{ $l->status == 'pending' ? 'selected' : '' }}>Diproses</option>
                                <option value="approved" style="background-color: #20bf6b; color: #ffffff;"
                                    {{ $l->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" style="background-color: #eb3b5a; color: #ffffff;"
                                    {{ $l->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>


                        </form>


                    </td>
                    <td>
                        <form action="{{ route('lokasi.destroy', $l->id) }}" method="POST">
                            {{-- <a class="btn btn-info" href="{{ route('lokasi.show', $l->id) }}">Show</a> --}}
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

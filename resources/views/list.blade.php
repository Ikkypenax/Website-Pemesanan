@extends('layouts.layouts')

@section('title', 'Katalog')

@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Image Preview</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" width="100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Card Catalog --}}
    <div class="reveal section-card">
        <div class="d-flex flex-wrap" style="padding: 100px 0px;">
            @foreach ($catalog as $c)
                <div class="w-25 card-item px-2 py-2">
                    <div class="card h-100">
                        <!-- Gambar yang akan dipilih untuk ditampilkan di modal -->
                        <img src="{{ asset('storage/images/' . $c->image) }}" class="card-img-top" alt="{{ $c->name }}"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                            onclick="showImage('{{ asset('storage/images/' . $c->image) }}')">
                        <div class="card-body">
                            <h5 class="card-title">{{ $c->name }}</h5>
                            <p class="card-text">{{ $c->description }}</p>
                            <p class="card-text"><strong>Kecepatan Layar :</strong> {{ $c->refreshrate }} Hz</p>

                            @php
                                // Cari panel yang memiliki name sama dengan catalog
                                $panel = $panels->firstWhere('type', $c->name);
                            @endphp

                            @if ($panel)
                                <p class="card-text"><strong>Harga Panel :</strong>
                                    Rp{{ number_format($panel->price, 0, ',', '.') }}</p>
                            @else
                                <p class="card-text text-muted">Harga Panel tidak tersedia</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

<script>
    // Fungsi untuk mengubah gambar dalam modal
    function showImage(imageSrc) {
        // Menyimpan URL gambar ke dalam modal
        document.getElementById('modalImage').src = imageSrc;
    }
</script>

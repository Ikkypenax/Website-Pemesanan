@extends('layouts.layouts')

@section('title', 'Galery')

@section('content')
    <div id="Catalog" class="catalog section">
        <div class="container mt-5">
        <div class="row">
            @foreach ($catalog as $c)
                <div class="col-md-4 mb-4">
                    <div class="card-inner">
                        <img src="{{ asset('storage/images/' . $c->image) }}" class="card-img-top" alt="{{ $c->name }}"
                            onclick="showImage('{{ asset('storage/images/' . $c->image) }}')">
                        <div class="card-body">
                            <h5 class="card-title">{{ $c->name }}</h5>
                            <p class="card-text">{{ $c->description }}</p>
                            <p class="card-text"><strong>Refresh Rate:</strong> {{ $c->freshrate }} Hz</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
        </section>
    @endsection
    <script>
        function showImage(url) {
            window.open(url, '_blank');
        }
    </script>

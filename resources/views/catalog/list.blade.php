@extends('layouts.layouts')

@section('title', 'Galery')

@section('content')
<div class="section-card">
    <div class="d-flex flex-wrap" style="padding: 100px 0px;">
        @foreach ($catalog as $c)
        <div class="w-25 card-item px-2 py-2">
            <div class="card h-100">
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
@endsection
<script>
    function showImage(url) {
        window.open(url, '_blank');
    }
</script>

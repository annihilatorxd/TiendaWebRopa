@extends('layouts.master')

@section('contenido-principal')

<div class="container mt-4">
    <div class="row">
        @foreach ($detallesVestimentas as $detallesVestimenta)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 15rem;">
                    <div style="width: 100%; height: 0; padding-bottom: 100%; overflow: hidden;">
                        <img src="{{ Storage::url($detallesVestimenta->vestimenta->imagen) }}" class="card-img-top" alt="Imagen">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $detallesVestimenta->vestimenta->nombre }}</h5>
                        <p class="card-text">Precio: {{ $detallesVestimenta->vestimenta->precio }}</p>
                        <p class="card-text">{{ $detallesVestimenta->categoria->nombre }}</p>
                        <a href="#" class="btn btn-primary">Añadir a carrito</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>





@endsection
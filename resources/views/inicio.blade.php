@extends('layouts.master')

@section('contenido-principal')
<div class="container mt-4">
    <form method="GET" action="{{ route('filtrar-prenda') }}">
        <div class="form-group">
            <label for="nombre_prenda">Selecciona la vestimenta:</label>
            <select class="form-control" id="nombre_prenda" name="nombre_prenda">
                <option value="">Todas las vestimentas</option>
                @foreach ($vestimentas as $vestimenta)
                    <option value="{{ $vestimenta->nombre }}">{{ $vestimenta->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>
    <div class="row">
    @foreach ($vestimentas as $vestimenta)
        <div class="col-md-4 mb-4">
            <form method="POST" action={{ route('compra.producto', ['idProducto' => $vestimenta->id]) }}>>
            <div class="card">
                <div class="text-center">
                    <img src="{{ Storage::url($vestimenta->imagen) }}" class="card-img-top mx-auto d-block" style="max-width: 450px; max-height: 450px;">
                </div>
                
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $vestimenta->nombre }}</h5>
                    <p class="card-text">{{ $vestimenta->descripcion }}</p>
                    <p class="card-text"><strong>Precio: ${{ $vestimenta->precio }}</strong></p>
                    <label for="talla">Talla:</label>
                        <select class="form-select" aria-label="Default select example" name="talla">
                            <option selected>Selecciona la Talla</option>
                            @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">{{ $talla->talla }}</option>
                            @endforeach
                        </select>

                    <!-- Agrega aquí el combo de tallas -->
                    {{-- <div class="form-group mt-3">
                        <label for="talla">Talla:</label>
                        <select class="form-select" aria-label="Default select example" name="talla">
                            <option selected>Selecciona la Talla</option>
                            @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">{{ $talla->talla }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                </div>
                <a href="{{ route('compra.producto', ['idProducto' => $vestimenta->id]) }}" class="btn btn-sm btn-info">Agregar al carro</a>
            </form>
            </div>

        </div>
    @endforeach
</div>


@endsection



@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('movimientos.update', ['movimiento' => $movimiento->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

    <label for="nombre" class="form-label">Movimiento</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre" value="{{ $movimiento->nombre }}">

    <label for="punteria" class="form-label">Precisión</label>
    <input type="number" class="form-control" id="punteria" aria-describedby="emailHelp" name="punteria" value="{{ $movimiento->punteria }}">

    <label for="descripcion" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="descripcion" aria-describedby="emailHelp" name="descripcion" value="{{ $movimiento->descripcion }}">

    <label for="efectoSecundario" class="form-label">Efecto secundario</label>
    <input type="text" class="form-control" id="efectoSecundario" aria-describedby="emailHelp" name="efectoSecundario" value="{{ $movimiento->efectoSecundario }}">

    <label for="pp" class="form-label">PP</label>
    <input type="number" class="form-control" id="pp" aria-describedby="emailHelp" name="pp" value="{{ $movimiento->pp }}">

    <label for="prioridad" class="form-label">Prioridad</label>
    <input type="number" class="form-control" id="prioridad" aria-describedby="emailHelp" name="prioridad" value="{{ $movimiento->prioridad }}">

    <label for="potencia" class="form-label">Potencia</label>
    <input type="number" class="form-control" id="potencia" aria-describedby="emailHelp" name="potencia" value="{{ $movimiento->potencia }}">

    <label for="clase" class="form-label">Clase</label>
    <select class="form-select" name="clase" id="clase" aria-label="Default select example">
        <option selected>Selecciona la clase</option>
        @foreach (config('enumClaseMov.clase') as $clase)
        @if ($movimiento->clase == $clase)
            <option selected value="{{ $clase }}">{{ $clase }}</option>
        @else
            <option value="{{ $clase }}">{{ $clase }}</option>
        @endif
            
        @endforeach
    </select>

    <label for="cambios" class="form-label">Cambios respecto a otras generaciones</label>
    <input type="text" class="form-control" id="cambios" aria-describedby="emailHelp" name="cambios" value="{{ $movimiento->cambios }}">

    <label for="objetivo" class="form-label">Tipo de objetivo</label>
    <select class="form-select" name="objetivo" id="objetivo" aria-label="Default select example">
        <option selected>Selecciona el tipo de objetivo</option>
        @foreach (config('enumObjetivoMov.objetivo') as $objetivo)
        @if ($movimiento->objetivo == $objetivo)
            <option selected value="{{ $objetivo }}">{{ $objetivo }}</option>
        @else
            <option value="{{ $objetivo }}">{{ $objetivo }}</option>
        @endif
        @endforeach
    </select>

    <label for="generacion_id" class="form-label">Generación</label>
    <select class="form-select"  name="generacion_id" id="generacion_id">
        <option selected>Selecciona la generación</option>
        @foreach ($generaciones as $generacion)
        @if ($movimiento->generacion_id == $generacion->id)
        <option selected value="{{ $generacion->id }}">Generación {{ $generacion->num_generacion }}</option>
        @else
            <option value="{{ $generacion->id }}">Generación {{ $generacion->num_generacion }}</option>
        @endif
        
        @endforeach
    </select>

    <label for="tipo_id" class="form-label">Tipo del movimiento</label>
    <select class="form-select"  name="tipo_id" id="tipo_id">
        <option selected>Selecciona el tipo</option>
        @foreach ($tipos as $tipo)
        @if ($movimiento->tipo_id == $tipo->id)
            <option selected value="{{ $tipo->id }}">Tipo {{ $tipo->nombre }}</option>
        @else
        <option value="{{ $tipo->id }}">Tipo {{ $tipo->nombre }}</option>
        @endif
        @endforeach
    </select>

             
            <input type="submit" value="Actualizar movimiento" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection
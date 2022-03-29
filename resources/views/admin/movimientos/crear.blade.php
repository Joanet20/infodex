@extends('admin.admin')

@section('content')

<form class="col-3 mx-auto mt-3 border" action="{{ route('movimientos.store') }}" method="POST">
    @csrf

    
  <div class="mb-3 p-3">
  @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
    <label for="nombre" class="form-label">Movimiento</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre">

    <label for="punteria" class="form-label">Precisión</label>
    <input type="number" class="form-control" id="punteria" aria-describedby="emailHelp" name="punteria">

    <label for="descripcion" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="descripcion" aria-describedby="emailHelp" name="descripcion">

    <label for="efectoSecundario" class="form-label">Efecto secundario</label>
    <input type="text" class="form-control" id="efectoSecundario" aria-describedby="emailHelp" name="efectoSecundario">

    <label for="pp" class="form-label">PP</label>
    <input type="number" class="form-control" id="pp" aria-describedby="emailHelp" name="pp">

    <label for="prioridad" class="form-label">Prioridad</label>
    <input type="number" class="form-control" id="prioridad" aria-describedby="emailHelp" name="prioridad">

    <label for="potencia" class="form-label">Potencia</label>
    <input type="number" class="form-control" id="potencia" aria-describedby="emailHelp" name="potencia">

    <label for="clase" class="form-label">Clase</label>
    <select class="form-select" name="clase" id="clase" aria-label="Default select example">
        <option selected>Selecciona la clase</option>
        @foreach (config('enumClaseMov.clase') as $clase)
            <option value="{{ $clase }}">{{ $clase }}</option>
        @endforeach
    </select>

    <label for="cambios" class="form-label">Cambios respecto a otras generaciones</label>
    <input type="text" class="form-control" id="cambios" aria-describedby="emailHelp" name="cambios">

    <label for="objetivo" class="form-label">Tipo de objetivo</label>
    <select class="form-select" name="objetivo" id="objetivo" aria-label="Default select example">
        <option selected>Selecciona el tipo de objetivo</option>
        @foreach (config('enumObjetivoMov.objetivo') as $objetivo)
            <option value="{{ $objetivo }}">{{ $objetivo }}</option>
        @endforeach
    </select>

    <label for="generacion_id" class="form-label">Generación</label>
    <select class="form-select"  name="generacion_id" id="generacion_id">
        <option selected>Selecciona la generación</option>
        @foreach ($generaciones as $generacion)
        <option value="{{ $generacion->id }}">Generación {{ $generacion->num_generacion }}</option>
        @endforeach
    </select>

    <label for="tipo_id" class="form-label">Tipo del movimiento</label>
    <select class="form-select"  name="tipo_id" id="tipo_id">
        <option selected>Selecciona el tipo</option>
        @foreach ($tipos as $tipo)
        <option value="{{ $tipo->id }}">Tipo {{ $tipo->nombre }}</option>
        @endforeach
    </select>
    
  </div>
  <button type="submit" class="btn btn-primary m-3">Crear</button>
</form>

@endsection
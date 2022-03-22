@extends('admin.admin')

@section('content')

<form class="col-3 mx-auto mt-3 border" action="{{ route('objetos.store') }}" method="POST">
    @csrf

    
  <div class="mb-3 p-3">
  @error('generacion_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <label for="nombre" class="form-label">Objeto</label>
            <input type="text" class="form-control mb-2" name="nombre" id="nombre">

            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control mb-2" name="precio" id="precio">

            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control mb-2" name="descripcion" id="descripcion" aria-label="With textarea"></textarea>

            <label for="categoria" class="form-label">Categoría</label>
            
            <select class="form-select" id="categoria">
                <option selected>Selecciona la categoria</option>
                @foreach (config('enums.categoria') as $categoria)
                <option value="{{ $categoria }}">{{ $categoria }}</option>
                @endforeach
            </select>

            <label for="nombre_jap" class="form-label">Nombre japonés</label>
            <input type="text" class="form-control mb-2" name="nombre_jap" id="nombre_jap">

            <label for="nombre_ale" class="form-label">Nombre alemán</label>
            <input type="text" class="form-control mb-2" name="nombre_ale" id="nombre_ale">

            <label for="nombre_ing" class="form-label">Nombre inglés</label>
            <input type="text" class="form-control mb-2" name="nombre_ing" id="nombre_ing">

            <label for="nombre_ita" class="form-label">Nombre italiano</label>
            <input type="text" class="form-control mb-2" name="nombre_ita" id="nombre_ita">

            <label for="nombre_fra" class="form-label">Nombre francés</label>
            <input type="text" class="form-control mb-2" name="nombre_fra" id="nombre_fra">

            <label for="generacion_id" class="form-label">Generación</label>
            <select class="form-select"  name="generacion_id" id="generacion_id">
                <option selected>Selecciona la generación</option>
                @foreach ($generaciones as $generacion)
                <option value="{{ $generacion->id }}">Generación {{ $generacion->num_generacion }}</option>
                @endforeach
            </select>
    
  </div>
  <button type="submit" class="btn btn-primary m-3">Crear</button>
</form>

@endsection
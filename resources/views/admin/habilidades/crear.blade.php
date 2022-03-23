@extends('admin.admin')

@section('content')

<form class="col-3 mx-auto mt-3 border" action="{{ route('habilidades.store') }}" method="POST">
    @csrf

    
  <div class="mb-3 p-3">
  @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <label for="nombre" class="form-label">Habilidad</label>
            <input type="text" class="form-control mb-2" name="nombre" id="nombre">

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

            <label for="efecto_en_combate" class="form-label">Efecto en combate</label>
            <textarea class="form-control mb-2" name="efecto_en_combate" id="efecto_en_combate" aria-label="With textarea"></textarea>

            <label for="efecto_fuera_combate" class="form-label">Efecto fuera de combate</label>
            <textarea class="form-control mb-2" name="efecto_fuera_combate" id="efecto_fuera_combate" aria-label="With textarea"></textarea>

            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control mb-2" name="descripcion" id="descripcion" aria-label="With textarea"></textarea>

            <label for="cambios" class="form-label">Cambios respecto a generaciones anteriores</label>
            <textarea class="form-control mb-2" name="cambios" id="cambios" aria-label="With textarea"></textarea>

            <label for="generacion_id" class="form-label">Generación</label>
            <select class="form-select" name="generacion_id" id="generacion_id">


                <option selected >Selecciona una generación</option>
                @foreach ($generaciones as $generacion)
                
                <option value="{{ $generacion->id }}">Generación {{ $generacion->num_generacion }}</option>
                
                
                @endforeach
            </select>
    
  </div>
  <button type="submit" class="btn btn-primary m-3">Crear</button>
</form>

@endsection
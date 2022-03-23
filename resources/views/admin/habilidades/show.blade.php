@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('habilidades.update', ['habilidade' => $habilidad->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <label for="nombre" class="form-label">Habilidad</label>
            <input type="text" class="form-control mb-2" name="nombre" id="nombre" value="{{ $habilidad->nombre }}">

            <label for="nombre_jap" class="form-label">Nombre japonés</label>
            <input type="text" class="form-control mb-2" name="nombre_jap" id="nombre_jap" value="{{ $habilidad->nombre_jap }}">

            <label for="nombre_ale" class="form-label">Nombre alemán</label>
            <input type="text" class="form-control mb-2" name="nombre_ale" id="nombre_ale" value="{{ $habilidad->nombre_ale }}">

            <label for="nombre_ing" class="form-label">Nombre inglés</label>
            <input type="text" class="form-control mb-2" name="nombre_ing" id="nombre_ing" value="{{ $habilidad->nombre_ing }}">

            <label for="nombre_ita" class="form-label">Nombre italiano</label>
            <input type="text" class="form-control mb-2" name="nombre_ita" id="nombre_ita" value="{{ $habilidad->nombre_ita }}">

            <label for="nombre_fra" class="form-label">Nombre francés</label>
            <input type="text" class="form-control mb-2" name="nombre_fra" id="nombre_fra" value="{{ $habilidad->nombre_fra }}">

            <label for="efecto_en_combate" class="form-label">Efecto en combate</label>
            <textarea class="form-control mb-2" name="efecto_en_combate" id="efecto_en_combate" value="{{ $habilidad->efecto_en_combate }}" aria-label="With textarea">{{ $habilidad->efecto_en_combate }}</textarea>

            <label for="efecto_fuera_combate" class="form-label">Efecto fuera de combate</label>
            <textarea class="form-control mb-2" name="efecto_fuera_combate" id="efecto_fuera_combate" value="{{ $habilidad->efecto_fuera_combate }}" aria-label="With textarea">{{ $habilidad->efecto_fuera_combate }}</textarea>

            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control mb-2" name="descripcion" id="descripcion" value="{{ $habilidad->descripcion }}" aria-label="With textarea">{{ $habilidad->descripcion }}</textarea>

            <label for="cambios" class="form-label">Cambios respecto a generaciones anteriores</label>
            <textarea class="form-control mb-2" name="cambios" id="cambios" value="{{ $habilidad->cambios }}" aria-label="With textarea">{{ $habilidad->cambios }}</textarea>

            <label for="generacion_id" class="form-label">Generación</label>
            <select class="form-select" name="generacion_id" id="generacion_id">
                
                @foreach ($generaciones as $generacion)

                @if ($habilidad->generacion_id == $generacion->id)
                <option selected value="{{ $generacion->id }}">{{ $generacion->num_generacion }}</option>
                @else
                <option value="{{ $generacion->id }}">{{ $generacion->num_generacion }}</option>
                @endif
                
                @endforeach
            </select>
             
            <input type="submit" value="Actualizar habilidad" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection
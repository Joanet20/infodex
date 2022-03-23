@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('objetos.update', ['objeto' => $objeto->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('generacion_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <label for="nombre" class="form-label">Objeto</label>
            <input type="text" class="form-control mb-2" name="nombre" id="nombre" value="{{ $objeto->nombre }}">

            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control mb-2" name="precio" id="precio" value="{{ $objeto->precio }}">

            <label for="descripcion" class="form-label">Descripción</label>
            <!--input type="number" class="form-control mb-2" name="descripcion" id="descripcion" value="{{ $objeto->descripcion }}"-->
            <textarea class="form-control mb-2" name="descripcion" id="descripcion" value="{{ $objeto->descripcion }}" aria-label="With textarea">{{ $objeto->descripcion }}</textarea>

            <label for="categoria" class="form-label">Categoría</label>
            <!--input type="number" class="form-control mb-2" name="categoria" id="categoria" value="{{ $objeto->categoria }}"-->
            <select class="form-select" name="categoria" id="categoria">
                @foreach (config('enums.categoria') as $categoria)
                @if ($objeto->categoria == $categoria)
                <option selected value="{{ $categoria }}">{{ $categoria }}</option>
                @else
                <option value="{{ $categoria }}">{{ $categoria }}</option>
                @endif
                
                @endforeach
            </select>

            <label for="nombre_jap" class="form-label">Nombre japonés</label>
            <input type="text" class="form-control mb-2" name="nombre_jap" id="nombre_jap" value="{{ $objeto->nombre_jap }}">

            <label for="nombre_ale" class="form-label">Nombre alemán</label>
            <input type="text" class="form-control mb-2" name="nombre_ale" id="nombre_ale" value="{{ $objeto->nombre_ale }}">

            <label for="nombre_ing" class="form-label">Nombre inglés</label>
            <input type="text" class="form-control mb-2" name="nombre_ing" id="nombre_ing" value="{{ $objeto->nombre_ing }}">

            <label for="nombre_ita" class="form-label">Nombre italiano</label>
            <input type="text" class="form-control mb-2" name="nombre_ita" id="nombre_ita" value="{{ $objeto->nombre_ita }}">

            <label for="nombre_fra" class="form-label">Nombre francés</label>
            <input type="text" class="form-control mb-2" name="nombre_fra" id="nombre_fra" value="{{ $objeto->nombre_fra }}">

            <label for="generacion_id" class="form-label">Generación</label>
            <select class="form-select" name="generacion_id" id="generacion_id">
                
                @foreach ($generaciones as $generacion)

                @if ($objeto->generacion_id == $generacion->id)
                <option selected value="{{ $generacion->id }}">{{ $generacion->num_generacion }}</option>
                @else
                <option value="{{ $generacion->id }}">{{ $generacion->num_generacion }}</option>
                @endif
                
                @endforeach
            </select>
             
            <input type="submit" value="Actualizar objeto" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection
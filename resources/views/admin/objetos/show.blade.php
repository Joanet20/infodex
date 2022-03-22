@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('objetos.update', ['objetos' => $objeto->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('nombre')
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
            <textarea clclass="form-control mb-2" name="descripcion" id="descripcion" value="{{ $objeto->descripcion }}" aria-label="With textarea"></textarea>

            <label for="categoria" class="form-label">Categoría</label>
            <!--input type="number" class="form-control mb-2" name="categoria" id="categoria" value="{{ $objeto->categoria }}"-->
            <select class="form-select" id="categoria">
                <option selected>Selecciona la categoria</option>
                @foreach (config('enum.categoria') as $categoria)
                <option value="{{ $categoria }}">{{ $categoria }}</option>
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

            <label for="generacion" class="form-label">Generación</label>
            <select class="form-select" id="generacion">
                <option selected>Selecciona la generación</option>
                @foreach ($generaciones as $generacion)
                <option value="{{ $generacion->id }}">{{ $generacion->nombre }}</option>
                @endforeach
            </select>
             
            <input type="submit" value="Actualizar objeto" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection
@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('metodosEvolucion.update', ['metodosEvolucion' => $metodoEvolucion->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <label for="nombre" class="form-label">Método de evolución</label>
            <input type="text" class="form-control mb-2" name="nombre" id="nombre" value="{{ $metodoEvolucion->nombre }}">

            <label for="frase" class="form-label">Frase explicativa</label>
            <input type="text" class="form-control mb-2" name="frase" id="frase" value="{{ $metodoEvolucion->frase }}">
             
            <input type="submit" value="Actualizar método de evolución" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection
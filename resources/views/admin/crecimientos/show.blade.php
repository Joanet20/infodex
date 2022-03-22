@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('crecimientos.update', ['crecimiento' => $crecimiento->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control mb-2" name="nombre" id="nombre" value="{{ $crecimiento->nombre }}">

            <label for="puntos_exp" class="form-label">Puntos de experiencia</label>
            <input type="number" class="form-control mb-2" name="puntos_exp" id="puntos_exp" value="{{ $crecimiento->puntos_exp }}">

             
            <input type="submit" value="Actualizar crecimiento" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection
@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('gruposHuevo.update', ['gruposHuevo' => $grupoHuevo->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <label for="nombre" class="form-label">Nombre grupo huevo</label>
            <input type="text" class="form-control mb-2" name="nombre" id="nombre" value="{{ $grupoHuevo->nombre }}">

             
            <input type="submit" value="Actualizar grupo huevo" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection
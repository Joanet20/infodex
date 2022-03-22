@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('generaciones.update', ['generacione' => $generacion->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <label for="num_generacion" class="form-label">Generación</label>
            <input type="number" class="form-control mb-2" name="num_generacion" id="num_generacion" value="{{ $generacion->num_generacion }}">
             
            <input type="submit" value="Actualizar generación" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection
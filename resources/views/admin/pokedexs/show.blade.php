@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('pokedexs.update', ['pokedex' => $pokedex->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <label for="nombre" class="form-label">Pokedex</label>
            <input type="text" class="form-control mb-2" name="nombre" id="nombre" value="{{ $pokedex->nombre }}">

            <label for="region_id" class="form-label">Región</label>
            <select class="form-select" name="region_id" id="region_id">
                
                @foreach ($regiones as $region)

                @if ($pokedex->region_id == $region->id)
                <option selected value="{{ $region->id }}">{{ $region->nombre }}</option>
                @else
                <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                @endif
                
                @endforeach
            </select>

             
            <input type="submit" value="Actualizar pokedex" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection
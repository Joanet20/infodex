@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('cadenasEvolutivas.update', ['cadenasEvolutiva' => $cadenaEvolutiva->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

    <label for="pokemonBase_id" class="form-label">Pokémon base</label>
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Busca el Pokémon" name="pokemonBase_id">
    <datalist id="datalistOptions">

    @foreach ($pokemons as $pokemon)
    @if ($cadenaEvolutiva->pokemonBase_id == $pokemon->id)
        <option selected value="{{ $pokemon->id }}">{{ $pokemon->nombreForma }}</option>
    @endif
        <option value="{{ $pokemon->id }}">{{ $pokemon->nombreForma }}</option>
    @endforeach
        
    </datalist>

    <label for="metodoEvolucion1" class="form-label">Cómo evoluciona el Pokémon Base</label>
    <input type="text" class="form-control" id="metodoEvolucion1" aria-describedby="emailHelp" name="metodoEvolucion1" value="{{ $cadenaEvolutiva->metodoEvolucion1 }}">

    <label for="pokemon1_id" class="form-label">Pokémon 1</label>
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Busca el Pokémon" name="pokemon1_id">
    <datalist id="datalistOptions">

    @foreach ($pokemons as $pokemon)
    @if ($cadenaEvolutiva->pokemon1_id == $pokemon->id)
        <option selected value="{{ $pokemon->id }}">{{ $pokemon->nombreForma }}</option>
    @endif
        <option value="{{ $pokemon->id }}">{{ $pokemon->nombreForma }}</option>
    @endforeach
        
    </datalist>


    <label for="metodoEvolucion2" class="form-label">Cómo evoluciona el Pokémon 1</label>
    <input type="text" class="form-control" id="metodoEvolucion2" aria-describedby="emailHelp" name="metodoEvolucion2" value="{{ $cadenaEvolutiva->metodoEvolucion2 }}">

    <label for="pokemon2_id" class="form-label">Pokémon 2</label>
    
    @foreach ($pokemons as $pokemon)
    @if ($pokemon->id == $cadenaEvolutiva->pokemon2_id)
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Busca el Pokémon" name="pokemon2_id" value="{{ $pokemon->nombreForma }}">
    @endif
        
    @endforeach
    
    <datalist id="datalistOptions">

    @foreach ($pokemons as $pokemon)
        <option value="{{ $pokemon->id }}">{{ $pokemon->nombreForma }}</option>
    @endforeach
        
    </datalist>

             
            <input type="submit" value="Actualizar cadena evolutiva" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection
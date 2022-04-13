@extends('admin.admin')

@section('content')

<form class="col-3 mx-auto mt-3 border" action="{{ route('cadenasEvolutivas.store') }}" method="POST">
    @csrf

    
  <div class="mb-3 p-3">
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
        <option value="{{ $pokemon->id }}">{{ $pokemon->nombreForma }}</option>
    @endforeach
        
    </datalist>

    <label for="metodoEvolucion1" class="form-label">Cómo evoluciona el Pokémon Base</label>
    <input type="text" class="form-control" id="metodoEvolucion1" aria-describedby="emailHelp" name="metodoEvolucion1">

    <label for="pokemon1_id" class="form-label">Pokémon 1</label>
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Busca el Pokémon" name="pokemon1_id">
    <datalist id="datalistOptions">

    @foreach ($pokemons as $pokemon)
        <option value="{{ $pokemon->id }}">{{ $pokemon->nombreForma }}</option>
    @endforeach
        
    </datalist>


    <label for="metodoEvolucion2" class="form-label">Cómo evoluciona el Pokémon 1</label>
    <input type="text" class="form-control" id="metodoEvolucion2" aria-describedby="emailHelp" name="metodoEvolucion2">

    <label for="pokemon2_id" class="form-label">Pokémon 2</label>
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Busca el Pokémon" name="pokemon2_id">
    <datalist id="datalistOptions">

    @foreach ($pokemons as $pokemon)
        <option value="{{ $pokemon->id }}">{{ $pokemon->nombreForma }}</option>
    @endforeach
        
    </datalist>
    
  </div>
  <button type="submit" class="btn btn-primary m-3">Crear</button>
</form>

@endsection
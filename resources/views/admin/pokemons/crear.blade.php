@extends('admin.admin')

@section('content')

<form class="col-3 mx-auto mt-3 border" action="{{ route('pokemons.store') }}" method="POST">
    @csrf

    
  <div class="mb-3 p-3">
  @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
    <label for="nombre" class="form-label">Pokémon</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre">

    <label for="experienciaBase" class="form-label">Experiencia base</label>
    <input type="number" class="form-control" id="experienciaBase" aria-describedby="emailHelp" name="experienciaBase">

    <label for="altura" class="form-label">Altura</label>
    <input type="number" class="form-control" id="altura" aria-describedby="emailHelp" name="altura">
    
    <label for="peso" class="form-label">Peso</label>
    <input type="number" class="form-control" id="peso" aria-describedby="emailHelp" name="peso">

    <label for="dex_nacional" class="form-label">Número Pokédex Nacional</label>
    <input type="text" class="form-control" id="dex_nacional" aria-describedby="emailHelp" name="dex_nacional">

    <label for="cambios" class="form-label">Cambios respecto a otras generaciones</label>
    <textarea class="form-control" name="cambios" id="cambios"></textarea>

    <label for="categoria" class="form-label">Categoría</label>
    <input type="text" class="form-control" id="categoria" aria-describedby="emailHelp" name="categoria">

    <label for="evEntregado" class="form-label">EV entregado y cantidad</label>
    <select class="form-select" name="evEntregado" id="evEntregado">
        <option selected>Selecciona el EV</option>
        @foreach (config('enumEVEntregado.evEntregado') as $ev)
        <option value="{{ $ev }}">{{ $ev }}</option>
        @endforeach
    </select>

    <select class="form-select" name="cantidadEV" id="cantidadEV">
        <option selected>Selecciona la cantidad</option>
        @foreach (config('enumCantEV.cantEV') as $cantev)
        <option value="{{ $cantev }}">{{ $cantev }}</option>
        @endforeach
    </select>

    <label for="evEntregado2" class="form-label">EV entregado y cantidad (2)</label>
    <select class="form-select" name="evEntregado2" id="evEntregado2">
        <option selected>Selecciona el EV</option>
        @foreach (config('enumEVEntregado.evEntregado') as $ev)
        <option value="{{ $ev }}">{{ $ev }}</option>
        @endforeach
    </select>

    <select class="form-select" name="cantidadEV2" id="cantidadEV2">
        <option selected>Selecciona la cantidad</option>
        @foreach (config('enumCantEV.cantEV') as $cantev)
        <option value="{{ $cantev }}">{{ $cantev }}</option>
        @endforeach
    </select>

    <label for="evEntregado3" class="form-label">EV entregado y cantidad (3)</label>
    <select class="form-select" name="evEntregado3" id="evEntregado3">
        <option selected>Selecciona el EV</option>
        @foreach (config('enumEVEntregado.evEntregado') as $ev)
        <option value="{{ $ev }}">{{ $ev }}</option>
        @endforeach
    </select>

    <select class="form-select" name="cantidadEV" id="cantidadEV">
        <option selected>Selecciona la cantidad</option>
        @foreach (config('enumCantEV.cantEV') as $cantev)
        <option value="{{ $cantev }}">{{ $cantev }}</option>
        @endforeach
    </select>

    <label for="ratioCaptura" class="form-label">Ratio de captura</label>
    <input type="number" class="form-control" id="ratioCaptura" aria-describedby="emailHelp" name="ratioCaptura">
    
    <label for="amistadBase" class="form-label">Amistad base</label>
    <input type="number" class="form-control" id="amistadBase" aria-describedby="emailHelp" name="amistadBase">

    <label for="dex_nacional" class="form-label">Número Pokédex Nacional</label>
    <input type="text" class="form-control" id="dex_nacional" aria-describedby="emailHelp" name="dex_nacional">


    
  </div>
  <button type="submit" class="btn btn-primary m-3">Crear</button>
</form>

@endsection
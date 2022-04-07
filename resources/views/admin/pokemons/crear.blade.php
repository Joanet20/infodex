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

    <select class="form-select" name="cantidadEV3" id="cantidadEV3">
        <option selected>Selecciona la cantidad</option>
        @foreach (config('enumCantEV.cantEV') as $cantev)
        <option value="{{ $cantev }}">{{ $cantev }}</option>
        @endforeach
    </select>

    <label for="ratioCaptura" class="form-label">Ratio de captura</label>
    <input type="number" class="form-control" id="ratioCaptura" aria-describedby="emailHelp" name="ratioCaptura">
    
    <label for="amistadBase" class="form-label">Amistad base</label>
    <input type="number" class="form-control" id="amistadBase" aria-describedby="emailHelp" name="amistadBase">

    <label for="probMacho" class="form-label">Probabilidad de Macho</label>
    <input type="number" class="form-control" id="probMacho" aria-describedby="emailHelp" name="probMacho">

    <label for="probHembra" class="form-label">Probabilidad de Hembra</label>
    <input type="number" class="form-control" id="probHembra" aria-describedby="emailHelp" name="probHembra">

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="sinGenero" name="sinGenero">
        <label class="form-check-label" for="sinGenero">
        Sin género
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="unicaForma" name="unicaForma" onclick="comprobarUnicaForma()">
        <label class="form-check-label" for="unicaForma">
        Tiene más de una forma
        </label>
    </div>

    <label for="nombreForma" class="form-label">Nombre de la forma</label>
    <input type="text" class="form-control" id="nombreForma" aria-describedby="emailHelp" name="nombreForma" disabled>

    <label for="nombre_jap" class="form-label">Nombre japonés</label>
    <input type="text" class="form-control mb-2" name="nombre_jap" id="nombre_jap">

    <label for="nombre_ale" class="form-label">Nombre alemán</label>
    <input type="text" class="form-control mb-2" name="nombre_ale" id="nombre_ale">

    <label for="nombre_ing" class="form-label">Nombre inglés</label>
    <input type="text" class="form-control mb-2" name="nombre_ing" id="nombre_ing">

    <label for="nombre_ita" class="form-label">Nombre italiano</label>
    <input type="text" class="form-control mb-2" name="nombre_ita" id="nombre_ita">

    <label for="nombre_fra" class="form-label">Nombre francés</label>
    <input type="text" class="form-control mb-2" name="nombre_fra" id="nombre_fra">

    <label for="crecimiento_id" class="form-label">Crecimiento</label>
    <select class="form-select"  name="crecimiento_id" id="crecimiento_id">
        <option selected>Selecciona el crecimiento</option>
        @foreach ($crecimientos as $crecimiento)
        <option value="{{ $crecimiento->id }}">{{ $crecimiento->nombre }}</option>
        @endforeach
    </select>

    <label for="ciclosHuevo_id" class="form-label">Ciclos huevo</label>
    <select class="form-select"  name="ciclosHuevo_id" id="ciclosHuevo_id">
        <option selected>Selecciona los ciclos</option>
        @foreach ($ciclosHuevo as $cicloHuevo)
        <option value="{{ $cicloHuevo->id }}">{{ $cicloHuevo->num_ciclos }}</option>
        @endforeach
    </select>

    <label for="objeto_id" class="form-label">Objeto equipado</label>
    <select class="form-select"  name="objeto_id" id="objeto_id">
        <option selected>Selecciona el objeto equipado</option>
        @foreach ($objetos as $objeto)
        <option value="{{ $objeto->id }}">{{ $objeto->nombre }}</option>
        @endforeach
    </select>

    <label for="grupoHuevo_id" class="form-label">Grupo huevo</label>
    <select class="form-select"  name="grupoHuevo_id" id="grupoHuevo_id">
        <option selected>Selecciona el grupo huevo</option>
        @foreach ($gruposHuevo as $grupoHuevo)
        <option value="{{ $grupoHuevo->id }}">{{ $grupoHuevo->nombre }}</option>
        @endforeach
    </select>

    <label for="grupoHuevo2_id" class="form-label">Grupo huevo 2</label>
    <select class="form-select"  name="grupoHuevo2_id" id="grupoHuevo2_id">
        <option selected>Selecciona el grupo huevo 2</option>
        @foreach ($gruposHuevo as $grupoHuevo)
        <option value="{{ $grupoHuevo->id }}">{{ $grupoHuevo->nombre }}</option>
        @endforeach
    </select>

    <label for="habilidad_id" class="form-label">Habilidad 1</label>
    <select class="form-select"  name="habilidad_id" id="habilidad_id">
        <option selected>Selecciona la habilidad 1</option>
        @foreach ($habilidades as $habilidad)
        <option value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
        @endforeach
    </select>

    <label for="habilidad2_id" class="form-label">Habilidad 2</label>
    <select class="form-select"  name="habilidad2_id" id="habilidad2_id">
        <option selected>Selecciona la habilidad 2</option>
        @foreach ($habilidades as $habilidad)
        <option value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
        @endforeach
    </select>

    <label for="habilidadOculta_id" class="form-label">Habilidad oculta</label>
    <select class="form-select"  name="habilidadOculta_id" id="habilidadOculta_id">
        <option selected>Selecciona la habilidad oculta</option>
        @foreach ($habilidades as $habilidad)
        <option value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
        @endforeach
    </select>

    <label for="tipo_id" class="form-label">Tipo 1</label>
    <select class="form-select"  name="tipo_id" id="tipo_id">
        <option selected>Selecciona el tipo 1</option>
        @foreach ($tipos as $tipo)
        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
        @endforeach
    </select>

    <label for="tipo2_id" class="form-label">Tipo 2</label>
    <select class="form-select"  name="tipo2_id" id="tipo2_id">
        <option selected>Selecciona el tipo 2</option>
        @foreach ($tipos as $tipo)
        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
        @endforeach
    </select>

    <label for="generacion_id" class="form-label">Generación</label>
    <select class="form-select"  name="generacion_id" id="generacion_id">
        <option selected>Selecciona la generación</option>
        @foreach ($generaciones as $generacion)
        <option value="{{ $generacion->id }}">Generación {{ $generacion->num_generacion }}</option>
        @endforeach
    </select>
    
  </div>
  <button type="submit" class="btn btn-primary m-3">Crear</button>
</form>

@endsection
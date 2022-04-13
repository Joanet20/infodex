@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('pokemons.update', ['pokemon' => $pokemon->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <label for="nombre" class="form-label">Pokémon</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre" value="{{ $pokemon->nombre }}">

    <label for="experienciaBase" class="form-label">Experiencia base</label>
    <input type="number" class="form-control" id="experienciaBase" aria-describedby="emailHelp" name="experienciaBase" value="{{ $pokemon->experienciaBase }}">

    <label for="altura" class="form-label">Altura</label>
    <input type="number" class="form-control" id="altura" aria-describedby="emailHelp" name="altura" value="{{ $pokemon->altura }}">
    
    <label for="peso" class="form-label">Peso</label>
    <input type="number" class="form-control" id="peso" aria-describedby="emailHelp" name="peso" value="{{ $pokemon->peso }}">

    <label for="dex_nacional" class="form-label">Número Pokédex Nacional</label>
    <input type="text" class="form-control" id="dex_nacional" aria-describedby="emailHelp" name="dex_nacional" value="{{ $pokemon->dex_nacional }}">

    <label for="cambios" class="form-label">Cambios respecto a otras generaciones</label>
    <textarea class="form-control" name="cambios" id="cambios">{{ $pokemon->cambios }}</textarea>

    <label for="categoria" class="form-label">Categoría</label>
    <input type="text" class="form-control" id="categoria" aria-describedby="emailHelp" name="categoria" value="{{ $pokemon->categoria }}">

    <label for="evEntregado" class="form-label">EV entregado y cantidad</label>
    <select class="form-select" name="evEntregado" id="evEntregado">
        @foreach (config('enumEVEntregado.evEntregado') as $ev)
        @if ($pokemon->evEntregado == $ev)
        <option selected value="{{ $ev }}">{{ $ev }}</option>
        @else
        <option value="{{ $ev }}">{{ $ev }}</option>
        @endif
                
        @endforeach
    </select>

    <select class="form-select" name="cantidadEV" id="cantidadEV">
        @foreach (config('enumCantEV.cantEV') as $ev)
        @if ($pokemon->cantidadEV == $ev)
        <option selected value="{{ $ev }}">{{ $ev }}</option>
        @else
        <option value="{{ $ev }}">{{ $ev }}</option>
        @endif
                
        @endforeach
    </select>

    @if ($pokemon->evEntregado2 != null)
        <label for="evEntregado2" class="form-label">EV entregado y cantidad (2)</label>
        <select class="form-select" name="evEntregado2" id="evEntregado2">
        @foreach (config('enumEVEntregado.evEntregado') as $ev)
        @if ($pokemon->evEntregado2 == $ev)
        <option selected value="{{ $ev }}">{{ $ev }}</option>
        @else
        <option value="{{ $ev }}">{{ $ev }}</option>
        @endif
                
        @endforeach
        </select>

        <select class="form-select" name="cantidadEV2" id="cantidadEV2">
        @foreach (config('enumCantEV.cantEV') as $ev)
        @if ($pokemon->cantidadEV2 == $ev)
        <option selected value="{{ $ev }}">{{ $ev }}</option>
        @else
        <option value="{{ $ev }}">{{ $ev }}</option>
        @endif
                
        @endforeach
        </select>

    @else

    <label for="evEntregado2" class="form-label">EV entregado y cantidad (2)</label>
    <select class="form-select" name="evEntregado2" id="evEntregado2">
        <option value="" selected>Selecciona el EV</option-->
        @foreach (config('enumEVEntregado.evEntregado') as $ev)
        <option value="{{ $ev }}">{{ $ev }}</option>
        @endforeach
    </select>

    <select class="form-select" name="canridadEV2" id="cantidadEV2">
        <option value="" selected>Selecciona la cantidad</option>
        @foreach (config('enumCantEV.cantEV') as $cantev)
        <option value="{{ $cantev }}">{{ $cantev }}</option>
        @endforeach
    </select>
    @endif
    


    @if ($pokemon->evEntregado3 != null)
        <label for="evEntregado" class="form-label">EV entregado y cantidad (3)</label>
        <select class="form-select" name="evEntregado3" id="evEntregado3">
        @foreach (config('enumEVEntregado.evEntregado') as $ev)
        @if ($pokemon->evEntregado3 == $ev)
        <option selected value="{{ $ev }}">{{ $ev }}</option>
        @else
        <option value="{{ $ev }}">{{ $ev }}</option>
        @endif
                
        @endforeach
        </select>

        <select class="form-select" name="cantidadEV3" id="cantidadEV3">
        @foreach (config('enumCantEV.cantEV') as $ev)
        @if ($pokemon->cantidadEV3 == $ev)
        <option selected value="{{ $ev }}">{{ $ev }}</option>
        @else
        <option value="{{ $ev }}">{{ $ev }}</option>
        @endif
                
        @endforeach
        </select>

    @else
    <label for="evEntregado3" class="form-label">EV entregado y cantidad (3)</label>
    <select class="form-select" name="evEntregado3" id="evEntregado3">
        <option value="" selected>Selecciona el EV</option>
        @foreach (config('enumEVEntregado.evEntregado') as $ev)
        <option value="{{ $ev }}">{{ $ev }}</option>
        @endforeach
    </select>

    <select class="form-select" name="cantidadEV3" id="cantidadEV3">
        <option value="" selected>Selecciona la cantidad</option>
        @foreach (config('enumCantEV.cantEV') as $cantev)
        <option value="{{ $cantev }}">{{ $cantev }}</option>
        @endforeach
    </select>
    @endif
    

    

    <label for="ratioCaptura" class="form-label">Ratio de captura</label>
    <input type="number" class="form-control" id="ratioCaptura" aria-describedby="emailHelp" name="ratioCaptura" value="{{ $pokemon->ratioCaptura }}">
    
    <label for="amistadBase" class="form-label">Amistad base</label>
    <input type="number" class="form-control" id="amistadBase" aria-describedby="emailHelp" name="amistadBase" value="{{ $pokemon->amistadBase }}">

    


    @if ($pokemon->sinGenero)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="sinGenero" name="sinGenero" onclick="tieneGenero()" checked>
        <label class="form-check-label" for="sinGenero">
        Sin género
        </label>
    </div>

    <label for="probMacho" class="form-label">Probabilidad de Macho</label>
    <input type="number" class="form-control" id="probMacho" aria-describedby="emailHelp" name="probMacho" value="{{ $pokemon->probMacho }}" disabled>

    <label for="probHembra" class="form-label">Probabilidad de Hembra</label>
    <input type="number" class="form-control" id="probHembra" aria-describedby="emailHelp" name="probHembra" value="{{ $pokemon->probHembra }}" disabled>
    @else
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="sinGenero" name="sinGenero" onclick="tieneGenero()">
        <label class="form-check-label" for="sinGenero">
        Sin género
        </label>
    </div>

    <label for="probMacho" class="form-label">Probabilidad de Macho</label>
    <input type="number" class="form-control" id="probMacho" aria-describedby="emailHelp" name="probMacho" value="{{ $pokemon->probMacho }}">

    <label for="probHembra" class="form-label">Probabilidad de Hembra</label>
    <input type="number" class="form-control" id="probHembra" aria-describedby="emailHelp" name="probHembra" value="{{ $pokemon->probHembra }}">
    @endif
    

    @if ($pokemon->unicaForma)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="unicaForma" name="unicaForma" onclick="comprobarUnicaForma()" checked>
        <label class="form-check-label" for="unicaForma">
        Tiene más de una forma
        </label>
    </div>

    <label for="nombreForma" class="form-label">Nombre de la forma</label>
    <input type="text" class="form-control" id="nombreForma" aria-describedby="emailHelp" name="nombreForma" value="{{ $pokemon->nombreForma }}">
    @else
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="unicaForma" name="unicaForma" onclick="comprobarUnicaForma()">
        <label class="form-check-label" for="unicaForma">
        Tiene más de una forma
        </label>
    </div>

    <label for="nombreForma" class="form-label">Nombre de la forma</label>
    <input type="text" class="form-control" id="nombreForma" aria-describedby="emailHelp" name="nombreForma" value="{{ $pokemon->nombreForma }}" disabled>
    @endif

    

    <label for="nombre_jap" class="form-label">Nombre japonés</label>
    <input type="text" class="form-control mb-2" name="nombre_jap" id="nombre_jap" value="{{ $pokemon->nombre_jap }}">

    <label for="nombre_ale" class="form-label">Nombre alemán</label>
    <input type="text" class="form-control mb-2" name="nombre_ale" id="nombre_ale" value="{{ $pokemon->nombre_ale }}">

    <label for="nombre_ing" class="form-label">Nombre inglés</label>
    <input type="text" class="form-control mb-2" name="nombre_ing" id="nombre_ing" value="{{ $pokemon->nombre_ing }}">

    <label for="nombre_ita" class="form-label">Nombre italiano</label>
    <input type="text" class="form-control mb-2" name="nombre_ita" id="nombre_ita" value="{{ $pokemon->nombre_ita }}">

    <label for="nombre_fra" class="form-label">Nombre francés</label>
    <input type="text" class="form-control mb-2" name="nombre_fra" id="nombre_fra" value="{{ $pokemon->nombre_fra }}">

    <label for="crecimiento_id" class="form-label">Crecimiento</label>
    <select class="form-select" name="crecimiento_id" id="crecimiento_id">
                
        @foreach ($crecimientos as $crecimiento)

        @if ($pokemon->crecimiento_id == $crecimiento->id)
        <option selected value="{{ $crecimiento->id }}">{{ $crecimiento->nombre }}</option>
        @else
        <option value="{{ $crecimiento->id }}">{{ $crecimiento->nombre }}</option>
        @endif
                
        @endforeach
    </select>

    <label for="ciclosHuevo_id" class="form-label">Ciclos huevo</label>
    <select class="form-select" name="ciclosHuevo_id" id="ciclosHuevo_id">
                
        @foreach ($ciclosHuevo as $cicloHuevo)

        @if ($pokemon->ciclosHuevo_id == $cicloHuevo->id)
        <option selected value="{{ $cicloHuevo->id }}">{{ $cicloHuevo->num_ciclos }}</option>
        @else
        <option value="{{ $cicloHuevo->id }}">{{ $cicloHuevo->num_ciclos }}</option>
        @endif
                
        @endforeach
    </select>

    <label for="objeto_id" class="form-label">Objeto equipado</label>
    <select class="form-select"  name="objeto_id" id="objeto_id">
        @foreach ($objetos as $objeto)

        @if ($pokemon->objeto_id == $objeto->id)
        <option selected value="{{ $objeto->id }}">{{ $objeto->nombre }}</option>
        @else
        <option value="{{ $objeto->id }}">{{ $objeto->nombre }}</option>
        @endif
        
        @endforeach
    </select>

    <label for="grupoHuevo_id" class="form-label">Grupo huevo</label>
    <select class="form-select"  name="grupoHuevo_id" id="grupoHuevo_id">
        @foreach ($gruposHuevo as $grupoHuevo)
        @if ($pokemon->grupoHuevo_id == $grupoHuevo->id)
        <option selected value="{{ $grupoHuevo->id }}">{{ $grupoHuevo->nombre }}</option>
        @else
        <option value="{{ $grupoHuevo->id }}">{{ $grupoHuevo->nombre }}</option>
        @endif
        @endforeach
    </select>


    @if ($pokemon->grupoHuevo2_id != null)
        <label for="grupoHuevo2_id" class="form-label">Grupo huevo 2</label>
        <select class="form-select"  name="grupoHuevo2_id" id="grupoHuevo2_id">
        @foreach ($gruposHuevo as $grupoHuevo)
        @if ($pokemon->grupoHuevo_id == $grupoHuevo->id)
        <option selected value="{{ $grupoHuevo->id }}">{{ $grupoHuevo->nombre }}</option>
        @else
        <option value="{{ $grupoHuevo->id }}">{{ $grupoHuevo->nombre }}</option>
        @endif
        @endforeach
        </select>

    @else
    <label for="grupoHuevo2_id" class="form-label">Grupo huevo 2</label>
    <select class="form-select"  name="grupoHuevo2_id" id="grupoHuevo2_id">
        <option value="" selected>Selecciona el grupo huevo 2</option>
        @foreach ($gruposHuevo as $grupoHuevo)
        <option value="{{ $grupoHuevo->id }}">{{ $grupoHuevo->nombre }}</option>
        @endforeach
    </select>
    @endif
    

    <label for="habilidad_id" class="form-label">Habilidad 1</label>
    <select class="form-select"  name="habilidad_id" id="habilidad_id">
        @foreach ($habilidades as $habilidad)
        @if ($pokemon->habilidad_id == $habilidad->id)
        <option selected value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
        @else
        <option value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
        @endif
        @endforeach
    </select>


    @if ($pokemon->habilidad2_id != null)
        <label for="habilidad2_id" class="form-label">Habilidad 2</label>
    <select class="form-select"  name="habilidad2_id" id="habilidad2_id">
        @foreach ($habilidades as $habilidad)
        @if ($pokemon->habilidad_id == $habilidad->id)
        <option selected value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
        @else
        <option value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
        @endif
        @endforeach
    </select>

    @else
    <label for="habilidad2_id" class="form-label">Habilidad 2</label>
    <select class="form-select"  name="habilidad2_id" id="habilidad2_id">
        <option value="" selected>Selecciona la habilidad 2</option>
        @foreach ($habilidades as $habilidad)
        <option value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
        @endforeach
    </select>
    @endif
    


    @if ($pokemon->habilidadOculta_id != null)
        <label for="habilidadOculta_id" class="form-label">Habilidad oculta</label>
    <select class="form-select"  name="habilidadOculta_id" id="habilidadOculta_id">
        @foreach ($habilidades as $habilidad)
        @if ($pokemon->habilidad_id == $habilidad->id)
        <option selected value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
        @else
        <option value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
        @endif
        @endforeach
    </select>

    @else
    <label for="habilidadOculta_id" class="form-label">Habilidad oculta</label>
    <select class="form-select"  name="habilidadOculta_id" id="habilidadOculta_id">
        <option value="" selected>Selecciona la habilidad oculta</option>
        @foreach ($habilidades as $habilidad)
        <option value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
        @endforeach
    </select>
    @endif
    

    <label for="tipo_id" class="form-label">Tipo 1</label>
    <select class="form-select"  name="tipo_id" id="tipo_id">
        @foreach ($tipos as $tipo)
        @if ($pokemon->tipo_id == $tipo->id)
        <option selected value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
        @else
        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
        @endif
        @endforeach
    </select>


    @if ($pokemon->tipo2_id != null)
        <label for="tipo2_id" class="form-label">Tipo 2</label>
    <select class="form-select"  name="tipo2_id" id="tipo2_id">
        @foreach ($tipos as $tipo)
        @if ($pokemon->tipo_id == $tipo->id)
        <option selected value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
        @else
        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
        @endif
        @endforeach
    </select>

    @else
    <label for="tipo2_id" class="form-label">Tipo 2</label>
    <select class="form-select"  name="tipo2_id" id="tipo2_id">
        <option value="" selected>Selecciona el tipo 2</option>
        @foreach ($tipos as $tipo)
        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
        @endforeach
    </select>
    @endif
    

    <label for="generacion_id" class="form-label">Generación</label>
    <select class="form-select" name="generacion_id" id="generacion_id">
                
        @foreach ($generaciones as $generacion)

        @if ($pokemon->generacion_id == $generacion->id)
        <option selected value="{{ $generacion->id }}">Generación {{ $generacion->num_generacion }}</option>
        @else
        <option value="{{ $generacion->id }}"> Generación{{ $generacion->num_generacion }}</option>
        @endif
                
        @endforeach
    </select>

             
            <input type="submit" value="Actualizar Pokémon" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection
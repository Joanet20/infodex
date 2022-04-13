<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Pokemon;
use App\Models\Admin\Crecimiento;
use App\Models\Admin\CicloHuevo;
use App\Models\Admin\Objeto;
use App\Models\Admin\GrupoHuevo;
use App\Models\Admin\Habilidad;
use App\Models\Admin\Tipo;
use App\Models\Admin\Generacion;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Pokémon";
        $pokemons = Pokemon::all();
        return view('admin.pokemons.index', ['pokemons' => $pokemons], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Crear Pokémon";
        $crecimientos = Crecimiento::all();
        $ciclosHuevo = CicloHuevo::all();
        $objetos = Objeto::all();
        $gruposHuevo = GrupoHuevo::all();
        $habilidades = Habilidad::all();
        $tipos = Tipo::all();
        $generaciones = Generacion::all();
        return view('admin.pokemons.crear', ['crecimientos' => $crecimientos, 
        'ciclosHuevo' => $ciclosHuevo, 
        'objetos' => $objetos, 
        'gruposHuevo' => $gruposHuevo,
        'habilidades' => $habilidades,
        'tipos' => $tipos, 
        'generaciones' => $generaciones], compact('titlePage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'experienciaBase' => 'required',
            'altura' => 'required',
            'peso' => 'required',
            'dex_nacional' => 'required',
            'categoria' => 'required',
            'evEntregado' => 'required',
            'cantidadEV' => 'required',
            'ratioCaptura' => 'required',
            'amistadBase' => 'required',
            'nombre_jap' => 'required',
            'nombre_ale' => 'required',
            'nombre_ing' => 'required',
            'nombre_ita' => 'required',
            'nombre_fra' => 'required'
        ]);

        $pokemon = new Pokemon;
        $pokemon->nombre = $request->nombre;
        $pokemon->experienciaBase = $request->experienciaBase;
        $pokemon->altura = $request->altura;
        $pokemon->peso = $request->peso;
        $pokemon->dex_nacional = $request->dex_nacional;

        $stringDex = $request->dex_nacional;
        if (strlen($stringDex) < 3) {
            $calc = 3 - strlen($stringDex);

            for ($i=0; $i < $calc; $i++) { 
                $stringDex = "0" . $stringDex;
            }

        $pokemon->dex_nacional = $stringDex;
        }

        $pokemon->cambios = $request->cambios;
        $pokemon->categoria = $request->categoria;
        $pokemon->evEntregado = $request->evEntregado;
        $pokemon->cantidadEV = $request->cantidadEV;
        $pokemon->evEntregado2 = $request->evEntregado2;
        $pokemon->canridadEV2 = $request->canridadEV2;

        if ($request->evEntregado2 == null || $request->canridadEV2 == null) {
            $pokemon->evEntregado2 = null;
            $pokemon->canridadEV2 = null;
        }

        $pokemon->evEntregado3 = $request->evEntregado3;
        $pokemon->cantidadEV3 = $request->cantidadEV3;


        if ($request->evEntregado3 == null || $request->cantidadEV3 == null) {
            $pokemon->evEntregado3 = null;
            $pokemon->cantidadEV3 = null;
        }

        $pokemon->ratioCaptura = $request->ratioCaptura;
        $pokemon->amistadBase = $request->amistadBase;
        $pokemon->probMacho = $request->probMacho;
        $pokemon->probHembra = $request->probHembra;
        $pokemon->sinGenero = $request->sinGenero;

        if ($request->sinGenero == null) {
            $pokemon->sinGenero = 0;
        }

        $pokemon->unicaForma = $request->unicaForma;

        if ($request->unicaForma == null) {
            $pokemon->unicaForma = 0;
            $pokemon->nombreForma = $request->nombre;
        } else {
            $pokemon->nombreForma = $request->nombreForma;
        }

        
        $pokemon->nombre_jap = $request->nombre_jap;
        $pokemon->nombre_ale = $request->nombre_ale;
        $pokemon->nombre_ing = $request->nombre_ing;
        $pokemon->nombre_ita = $request->nombre_ita;
        $pokemon->nombre_fra = $request->nombre_fra;
        $pokemon->crecimiento_id = $request->crecimiento_id;
        $pokemon->ciclosHuevo_id = $request->ciclosHuevo_id;
        $pokemon->objeto_id = $request->objeto_id;

        $pokemon->grupoHuevo_id = $request->grupoHuevo_id;
        $pokemon->grupoHuevo2_id = $request->grupoHuevo2_id;
        $pokemon->habilidad_id = $request->habilidad_id;
        $pokemon->habilidad2_id = $request->habilidad2_id;
        $pokemon->habilidadOculta_id = $request->habilidadOculta_id;
        $pokemon->tipo_id = $request->tipo_id;
        $pokemon->tipo2_id = $request->tipo2_id;
        $pokemon->generacion_id = $request->generacion_id;

        //dd($pokemon);
        $pokemon->save();

        

        
        
        return redirect()->route('pokemons.index')->with('success', 'Se ha añadido el Pokémon');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pokemon = Pokemon::find($id);
        $crecimientos = Crecimiento::all();
        $ciclosHuevo = CicloHuevo::all();
        $objetos = Objeto::all();
        $gruposHuevo = GrupoHuevo::all();
        $habilidades = Habilidad::all();
        $tipos = Tipo::all();
        $generaciones = Generacion::all();
        $titlePage = $pokemon->nombre;
        return view('admin.pokemons.show', ['pokemon' => $pokemon, 
        'crecimientos' => $crecimientos, 
        'ciclosHuevo' => $ciclosHuevo, 
        'objetos' => $objetos, 
        'gruposHuevo' => $gruposHuevo,
        'habilidades' => $habilidades,
        'tipos' => $tipos, 
        'generaciones' => $generaciones], compact('titlePage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pokemon = Pokemon::find($id);
        
        $pokemon->nombre = $request->nombre;
        $pokemon->experienciaBase = $request->experienciaBase;
        $pokemon->altura = $request->altura;
        $pokemon->peso = $request->peso;
        $pokemon->dex_nacional = $request->dex_nacional;

        $stringDex = $request->dex_nacional;
        if (strlen($stringDex) < 3) {
            $calc = 3 - strlen($stringDex);

            for ($i=0; $i < $calc; $i++) { 
                $stringDex = "0" . $stringDex;
            }

        $pokemon->dex_nacional = $stringDex;
        }


        $pokemon->cambios = $request->cambios;
        $pokemon->categoria = $request->categoria;
        $pokemon->evEntregado = $request->evEntregado;
        $pokemon->cantidadEV = $request->cantidadEV;
        $pokemon->evEntregado2 = $request->evEntregado2;
        $pokemon->canridadEV2 = $request->canridadEV2;

        if ($request->evEntregado2 == null || $request->canridadEV2 == null) {
            $pokemon->evEntregado2 = null;
            $pokemon->canridadEV2 = null;
        }

        $pokemon->evEntregado3 = $request->evEntregado3;
        $pokemon->cantidadEV3 = $request->cantidadEV3;


        if ($request->evEntregado3 == null || $request->cantidadEV3 == null) {
            $pokemon->evEntregado3 = null;
            $pokemon->cantidadEV3 = null;
        }

        $pokemon->ratioCaptura = $request->ratioCaptura;
        $pokemon->amistadBase = $request->amistadBase;
        $pokemon->probMacho = $request->probMacho;
        $pokemon->probHembra = $request->probHembra;
        $pokemon->sinGenero = $request->sinGenero;

        if ($request->sinGenero == null) {
            $pokemon->sinGenero = 0;
        }

        $pokemon->unicaForma = $request->unicaForma;

        if ($request->unicaForma == null) {
            $pokemon->unicaForma = 0;
            $pokemon->nombreForma = $request->nombre;
        } else {
            $pokemon->nombreForma = $request->nombreForma;
        }

        
        $pokemon->nombre_jap = $request->nombre_jap;
        $pokemon->nombre_ale = $request->nombre_ale;
        $pokemon->nombre_ing = $request->nombre_ing;
        $pokemon->nombre_ita = $request->nombre_ita;
        $pokemon->nombre_fra = $request->nombre_fra;
        $pokemon->crecimiento_id = $request->crecimiento_id;
        $pokemon->ciclosHuevo_id = $request->ciclosHuevo_id;
        $pokemon->objeto_id = $request->objeto_id;

        $pokemon->grupoHuevo_id = $request->grupoHuevo_id;
        $pokemon->grupoHuevo2_id = $request->grupoHuevo2_id;
        $pokemon->habilidad_id = $request->habilidad_id;
        $pokemon->habilidad2_id = $request->habilidad2_id;
        $pokemon->habilidadOculta_id = $request->habilidadOculta_id;
        $pokemon->tipo_id = $request->tipo_id;
        $pokemon->tipo2_id = $request->tipo2_id;
        $pokemon->generacion_id = $request->generacion_id;
        $pokemon->save();

        return redirect()->route('pokemons.index')->with('success', 'Pokémon actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pokemon = Pokemon::find($id);
        $pokemon->delete();
        return redirect()->route('pokemons.index')->with('success', 'Se ha borrado el Pokémon');
    }
}

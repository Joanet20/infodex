<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Pokemon;

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
        return view('admin.pokemons.crear', compact('titlePage'));
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
            'dex_nacional' => 'required|min:3',
            'categoria' => 'required',
            'ev_entregado' => 'required',
            'cantidadEV' => 'required',
            'ratioCaptura' => 'required',
            'amistadBase' => 'required',
            'sinGenero' => 'required',
            'unicaForma' => 'required',
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
        $pokemon->dexNacional = $request->dexNacional;
        $pokemon->cambios = $request->cambios;
        $pokemon->categoria = $request->categoria;
        $pokemon->evEntregado = $request->evEntregado;
        $pokemon->cantidadEV = $request->cantidadEV;
        $pokemon->evEntregado2 = $request->evEntregado2;
        $pokemon->cantidadEV2 = $request->cantidadEV2;
        $pokemon->evEntregado3 = $request->evEntregado3;
        $pokemon->cantidadEV3 = $request->cantidadEV3;
        $pokemon->ratioCaptura = $request->ratioCaptura;
        $pokemon->amistadBase = $request->amistadBase;
        $pokemon->probMacho = $request->probMacho;
        $pokemon->probHembra = $request->probHembra;
        $pokemon->sinGenero = $request->sinGenero;
        $pokemon->unicaForma = $request->unicaForma;
        $pokemon->nombreForma = $request->nombreForma;
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
        $titlePage = $pokemon->nombreForma;
        return view('admin.pokemons.show', ['pokemon' => $pokemon], compact('titlePage'));
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
        $pokemon->dexNacional = $request->dexNacional;
        $pokemon->cambios = $request->cambios;
        $pokemon->categoria = $request->categoria;
        $pokemon->evEntregado = $request->evEntregado;
        $pokemon->cantidadEV = $request->cantidadEV;
        $pokemon->evEntregado2 = $request->evEntregado2;
        $pokemon->cantidadEV2 = $request->cantidadEV2;
        $pokemon->evEntregado3 = $request->evEntregado3;
        $pokemon->cantidadEV3 = $request->cantidadEV3;
        $pokemon->ratioCaptura = $request->ratioCaptura;
        $pokemon->amistadBase = $request->amistadBase;
        $pokemon->probMacho = $request->probMacho;
        $pokemon->probHembra = $request->probHembra;
        $pokemon->sinGenero = $request->sinGenero;
        $pokemon->unicaForma = $request->unicaForma;
        $pokemon->nombreForma = $request->nombreForma;
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

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
            'nombre_fra' => 'required',
            'unicaForma' => 'required',
        ]);

        $pokemon = new Pokemon;
        $pokemon->nombre = $request->num_ciclos;
        $pokemon->min_pasos = $request->min_pasos;
        $pokemon->max_pasos = $request->max_pasos;
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
        $titlePage = $pokemon->num_ciclos;
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
        
        $pokemon->num_ciclos = $request->num_ciclos;
        $pokemon->min_pasos = $request->min_pasos;
        $pokemon->max_pasos = $request->max_pasos;
        $pokemon->save();

        return redirect()->route('pokemons.index')->with('success', 'Ciclo huevo actualizado');
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
        return redirect()->route('pokemons.index')->with('success', 'Se ha borrado el ciclo huevo');
    }
}

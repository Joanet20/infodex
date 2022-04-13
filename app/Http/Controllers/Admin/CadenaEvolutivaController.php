<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CadenaEvolutiva;
use App\Models\Admin\Pokemon;

class CadenaEvolutivaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Cadenas Evolutivas";
        $cadenasEvolutivas = CadenaEvolutiva::all();
        $pokemons = Pokemon::all();
        return view('admin.cadenasEvolutivas.index', ['cadenasEvolutivas' => $cadenasEvolutivas, 'pokemons' => $pokemons], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Crear Cadena evolutiva";
        $pokemons = Pokemon::all();
        return view('admin.cadenasEvolutivas.crear', ['pokemons' => $pokemons], compact('titlePage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cadenaEvolutiva = new cadenaEvolutiva;
        $cadenaEvolutiva->pokemonBase_id = $request->pokemonBase_id;
        $cadenaEvolutiva->metodoEvolucion1 = $request->metodoEvolucion1;
        $cadenaEvolutiva->pokemon1_id = $request->pokemon1_id;
        $cadenaEvolutiva->metodoEvolucion2 = $request->metodoEvolucion2;
        $cadenaEvolutiva->pokemon2_id = $request->pokemon2_id;
        $cadenaEvolutiva->save();

        return redirect()->route('cadenasEvolutivas.index')->with('success', 'Se ha añadido la cadena evolutiva');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cadenaEvolutiva = CadenaEvolutiva::find($id);
        $titlePage = $cadenaEvolutiva->id;
        $pokemons = Pokemon::all();
        return view('admin.cadenasEvolutivas.show', ['cadenaEvolutiva' => $cadenaEvolutiva, 'pokemons' => $pokemons], compact('titlePage'));
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
        $cadenaEvolutiva = CadenaEvolutiva::find($id);
        
        $cadenaEvolutiva->pokemonBase_id = $request->pokemonBase_id;
        $cadenaEvolutiva->metodoEvolucion1 = $request->metodoEvolucion1;
        $cadenaEvolutiva->pokemon1_id = $request->pokemon1_id;
        $cadenaEvolutiva->metodoEvolucion2 = $request->metodoEvolucion2;
        $cadenaEvolutiva->pokemon2_id = $request->pokemon2_id;
        $cadenaEvolutiva->save();

        return redirect()->route('cadenasEvolutivas.index')->with('success', 'Cadena evolutiva actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cadenaEvolutiva = CadenaEvolutiva::find($id);
        $cadenaEvolutiva->delete();
        return redirect()->route('cadenasEvolutivas.index')->with('success', 'Se ha borrado la cadena evolutiva');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Pokedex;
use App\Models\Admin\Region;

class PokedexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Pokedex";
        $pokedexs = Pokedex::all();
        return view('admin.pokedexs.index', ['pokedexs' => $pokedexs], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Crear Pokedex";
        $regiones = Region::all();
        return view('admin.pokedexs.crear', ['regiones' => $regiones], compact('titlePage'));
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
        ]);

        $pokedex = new Pokedex;
        $pokedex->nombre = $request->nombre;
        $pokedex->region_id = $request->region_id;
        $pokedex->save();

        return redirect()->route('pokedexs.index')->with('success', 'Se ha añadido la pokedex');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pokedex = Pokedex::find($id);
        $regiones = Region::all();
        $titlePage = $pokedex->nombre;
        return view('admin.pokedexs.show', ['pokedex' => $pokedex, 'regiones' => $regiones], compact('titlePage'));
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
        $pokedex = Pokedex::find($id);
        
        $pokedex->nombre = $request->nombre;
        $pokedex->region_id = $request->region_id;
        $pokedex->save();

        return redirect()->route('pokedexs.index')->with('success', 'Pokedex actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pokedex = Pokedex::find($id);
        $pokedex->delete();
        return redirect()->route('pokedexs.index')->with('success', 'Se ha borrado la pokedex');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CicloHuevo;

class CicloHuevoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Ciclos Huevo";
        $ciclosHuevo = CicloHuevo::all();
        return view('admin.ciclosHuevo.index', ['ciclosHuevo' => $ciclosHuevo], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $titlePage = "Crear Ciclo Huevo";
        return view('admin.ciclosHuevo.crear', compact('titlePage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'num_ciclos' => 'required',
            'min_pasos' => 'required',
            'max_pasos' => 'required'
        ]);

        $cicloHuevo = new CicloHuevo;
        $cicloHuevo->num_ciclos = $request->num_ciclos;
        $cicloHuevo->min_pasos = $request->min_pasos;
        $cicloHuevo->max_pasos = $request->max_pasos;
        $cicloHuevo->save();

        return redirect()->route('ciclosHuevo.index')->with('success', 'Se ha añadido el ciclo huevo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cicloHuevo = CicloHuevo::find($id);
        $titlePage = $cicloHuevo->num_ciclos;
        return view('admin.ciclosHuevo.show', ['cicloHuevo' => $cicloHuevo], compact('titlePage'));
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
        
        $cicloHuevo = CicloHuevo::find($id);
        
        $cicloHuevo->num_ciclos = $request->num_ciclos;
        $cicloHuevo->min_pasos = $request->min_pasos;
        $cicloHuevo->max_pasos = $request->max_pasos;
        $cicloHuevo->save();

        return redirect()->route('ciclosHuevo.index')->with('success', 'Ciclo huevo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cicloHuevo = CicloHuevo::find($id);
        $cicloHuevo->delete();
        return redirect()->route('ciclosHuevo.index')->with('success', 'Se ha borrado el ciclo huevo');
    }
}

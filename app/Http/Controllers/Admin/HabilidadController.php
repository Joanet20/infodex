<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Habilidad;
use App\Models\Admin\Generacion;


class HabilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Habilidades";
        $habilidades = Habilidad::all();
        return view('admin.habilidades.index', ['habilidades' => $habilidades], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Crear Habilidad";
        $generaciones = Generacion::all();
        return view('admin.habilidades.crear', ['generaciones' => $generaciones], compact('titlePage'));
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
            'nombre_jap' => 'required',
            'nombre_ale' => 'required',
            'nombre_ing' => 'required',
            'nombre_ita' => 'required',
            'nombre_fra' => 'required',
            'descripcion' => 'required',
        ]);

        $habilidad = new Habilidad;
        $habilidad->nombre = $request->nombre;
        $habilidad->nombre_jap = $request->nombre_jap;
        $habilidad->nombre_ale = $request->nombre_ale;
        $habilidad->nombre_ing = $request->nombre_ing;
        $habilidad->nombre_ita = $request->nombre_ita;
        $habilidad->nombre_fra = $request->nombre_fra;
        $habilidad->efecto_en_combate = $request->efecto_en_combate;
        $habilidad->efecto_fuera_combate = $request->efecto_fuera_combate;
        $habilidad->descripcion = $request->descripcion;
        $habilidad->cambios = $request->cambios;
        $habilidad->generacion_id = $request->generacion_id;
        $habilidad->save();

        return redirect()->route('habilidades.index')->with('success', 'Se ha añadido la habilidad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habilidad = Habilidad::find($id);
        $generaciones = Generacion::all();
        $titlePage = $habilidad->nombre;
        return view('admin.habilidades.show', ['habilidad' => $habilidad, 'generaciones' => $generaciones], compact('titlePage'));
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
        $habilidad = Habilidad::find($id);
        
        $habilidad->nombre = $request->nombre;
        $habilidad->nombre_jap = $request->nombre_jap;
        $habilidad->nombre_ale = $request->nombre_ale;
        $habilidad->nombre_ing = $request->nombre_ing;
        $habilidad->nombre_ita = $request->nombre_ita;
        $habilidad->nombre_fra = $request->nombre_fra;
        $habilidad->efecto_en_combate = $request->efecto_en_combate;
        $habilidad->efecto_fuera_combate = $request->efecto_fuera_combate;
        $habilidad->descripcion = $request->descripcion;
        $habilidad->cambios = $request->cambios;
        $habilidad->generacion_id = $request->generacion_id;
        $habilidad->save();

        return redirect()->route('habilidades.index')->with('success', 'Habilidad actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habilidad = Habilidad::find($id);
        $habilidad->delete();
        return redirect()->route('habilidades.index')->with('success', 'Se ha borrado la habilidad');
    }
}

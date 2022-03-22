<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Generacion;

class GeneracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Generaciones";
        $generaciones = Generacion::all();
        return view('admin.generaciones.index', ['generaciones' => $generaciones], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Crear Ciclo Huevo";
        return view('admin.generaciones.crear', compact('titlePage'));
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
            'num_generacion' => 'required'
        ]);

        $generacion = new Generacion;
        $generacion->num_generacion = $request->num_generacion;
        $generacion->save();

        return redirect()->route('generaciones.index')->with('success', 'Se ha añadido la Generación');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $generacion = Generacion::find($id);
        $titlePage = $generacion->num_generacion;
        return view('admin.generaciones.show', ['generacion' => $generacion], compact('titlePage'));
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
        $generacion = Generacion::find($id);
        
        $generacion->num_generacion = $request->num_generacion;
        $generacion->save();

        return redirect()->route('generaciones.index')->with('success', 'Generación actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $generacion = Generacion::find($id);
        $generacion->delete();
        return redirect()->route('generaciones.index')->with('success', 'Se ha borrado la Generación');
    }
}

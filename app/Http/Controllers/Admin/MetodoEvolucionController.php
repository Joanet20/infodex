<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\MetodoEvolucion;

class MetodoEvolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Métodos de evolución";
        $metodosEvolucion = MetodoEvolucion::all();
        return view('admin.metodosEvolucion.index', ['metodosEvolucion' => $metodosEvolucion], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Crear Método de evolución";
        return view('admin.metodosEvolucion.crear', compact('titlePage'));
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
            'frase' => 'required'
        ]);

        $metodoEvolucion = new MetodoEvolucion;
        $metodoEvolucion->nombre = $request->nombre;
        $metodoEvolucion->frase = $request->frase;
        $metodoEvolucion->save();

        return redirect()->route('metodosEvolucion.index')->with('success', 'Se ha añadido el método de evolución');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metodoEvolucion = MetodoEvolucion::find($id);
        $titlePage = $metodoEvolucion->nombre;
        return view('admin.metodosEvolucion.show', ['metodoEvolucion' => $metodoEvolucion], compact('titlePage'));
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
        $metodoEvolucion = MetodoEvolucion::find($id);
        
        $metodoEvolucion->nombre = $request->nombre;
        $metodoEvolucion->frase = $request->frase;
        $metodoEvolucion->save();

        return redirect()->route('metodosEvolucion.index')->with('success', 'Método de evolución actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $metodoEvolucion = MetodoEvolucion::find($id);
        $metodoEvolucion->delete();
        return redirect()->route('metodosEvolucion.index')->with('success', 'Se ha borrado el método de evolución');
    }
}

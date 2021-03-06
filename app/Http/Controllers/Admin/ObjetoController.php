<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Objeto;
use App\Models\Admin\Generacion;

class ObjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Objetos";
        $objetos = Objeto::all();
        return view('admin.objetos.index', ['objetos' => $objetos], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Crear Objeto";
        $generaciones = Generacion::all();
        $objetos = Objeto::all();
        return view('admin.objetos.crear', ['generaciones' => $generaciones, 'objetos' => $objetos], compact('titlePage'));
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
            'descripcion' => 'required',
            'categoria' => 'required',
            'nombre_jap' => 'required',
            'nombre_ale' => 'required',
            'nombre_ing' => 'required',
            'nombre_ita' => 'required',
            'nombre_fra' => 'required'
        ]);

        $objeto = new Objeto;
        $objeto->nombre = $request->nombre;
        $objeto->precio = $request->precio;
        $objeto->descripcion = $request->descripcion;
        $objeto->categoria = $request->categoria;
        $objeto->nombre_jap = $request->nombre_jap;
        $objeto->nombre_ale = $request->nombre_ale;
        $objeto->nombre_ing = $request->nombre_ing;
        $objeto->nombre_ita = $request->nombre_ita;
        $objeto->nombre_fra = $request->nombre_fra;
        $objeto->generacion_id = $request->generacion_id;
        $objeto->save();

        return redirect()->route('objetos.index')->with('success', 'Se ha a??adido el objeto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $objeto = Objeto::find($id);
        $generaciones = Generacion::all();
        $titlePage = $objeto->nombre;
        return view('admin.objetos.show', ['objeto' => $objeto, 'generaciones' => $generaciones], compact('titlePage'));
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
        $objeto = Objeto::find($id);
        
        $objeto->nombre = $request->nombre;
        $objeto->precio = $request->precio;
        $objeto->descripcion = $request->descripcion;
        $objeto->categoria = $request->categoria;
        $objeto->nombre_jap = $request->nombre_jap;
        $objeto->nombre_ale = $request->nombre_ale;
        $objeto->nombre_ing = $request->nombre_ing;
        $objeto->nombre_ita = $request->nombre_ita;
        $objeto->nombre_fra = $request->nombre_fra;
        $objeto->generacion_id = $request->generacion_id;
        $objeto->save();

        return redirect()->route('objetos.index')->with('success', 'Objeto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objeto = Objeto::find($id);
        $objeto->delete();
        return redirect()->route('objetos.index')->with('success', 'Se ha borrado el objeto');
    }
}

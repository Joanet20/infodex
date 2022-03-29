<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Movimiento;
use App\Models\Admin\Tipo;
use App\Models\Admin\Generacion;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Movimientos";
        $movimientos = Movimiento::all();
        return view('admin.movimientos.index', ['movimientos' => $movimientos], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Crear Movimiento";
        $generaciones = Generacion::all();
        $tipos = Tipo::all();
        return view('admin.movimientos.crear', ['generaciones' => $generaciones, 'tipos' => $tipos], compact('titlePage'));
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
            'pp' => 'required',
            'prioridad' => 'required',
            'clase' => 'required',
            'objetivo' => 'required',

        ]);

        $movimiento = new Movimiento;
        $movimiento->nombre = $request->nombre;
        $movimiento->punteria = $request->punteria;
        $movimiento->efectoSecundario = $request->efectoSecundario;
        $movimiento->descripcion = $request->descripcion;
        $movimiento->pp = $request->pp;
        $movimiento->prioridad = $request->prioridad;
        $movimiento->potencia = $request->potencia;
        $movimiento->clase = $request->clase;
        $movimiento->cambios = $request->cambios;
        $movimiento->objetivo = $request->objetivo;
        $movimiento->generacion_id = $request->generacion_id;
        $movimiento->tipo_id = $request->tipo_id;
        $movimiento->save();

        return redirect()->route('movimientos.index')->with('success', 'Se ha añadido el movimiento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movimiento = Movimiento::find($id);
        $generaciones = Generacion::all();
        $tipos = Tipo::all();
        $titlePage = $movimiento->nombre;
        return view('admin.movimientos.show', ['movimiento' => $movimiento, 'generaciones' => $generaciones, 'tipos' => $tipos], compact('titlePage'));
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
        $movimiento = Movimiento::find($id);
        
        $movimiento->nombre = $request->nombre;
        $movimiento->punteria = $request->punteria;
        $movimiento->efectoSecundario = $request->efectoSecundario;
        $movimiento->descripcion = $request->descripcion;
        $movimiento->pp = $request->pp;
        $movimiento->prioridad = $request->prioridad;
        $movimiento->potencia = $request->potencia;
        $movimiento->clase = $request->clase;
        $movimiento->cambios = $request->cambios;
        $movimiento->objetivo = $request->objetivo;
        $movimiento->generacion_id = $request->generacion_id;
        $movimiento->tipo_id = $request->tipo_id;
        $movimiento->save();

        return redirect()->route('movimientos.index')->with('success', 'Ciclo huevo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movimiento = Movimiento::find($id);
        $movimiento->delete();
        return redirect()->route('movimientos.index')->with('success', 'Se ha borrado el ciclo huevo');
    }
}

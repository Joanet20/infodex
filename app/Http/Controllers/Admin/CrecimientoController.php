<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Crecimiento;

class CrecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Crecimientos";
        $crecimientos = Crecimiento::all();
        return view('admin.crecimientos.index', ['crecimientos' => $crecimientos], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Crear Crecimiento";
        return view('admin.crecimientos.crear', compact('titlePage'));
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
            'puntos_exp' => 'required'
        ]);

        $crecimiento = new Crecimiento;
        $crecimiento->nombre = $request->nombre;
        $crecimiento->puntos_exp = $request->puntos_exp;
        
        $crecimiento->save();

        return redirect()->route('crecimientos.index')->with('success', 'Se ha añadido el crecimiento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crecimiento = Crecimiento::find($id);
        $titlePage = $crecimiento->nombre;
        return view('admin.crecimientos.show', ['crecimiento' => $crecimiento], compact('titlePage'));
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
        $crecimiento = Crecimiento::find($id);

        $crecimiento->nombre = $request->nombre;
        $crecimiento->puntos_exp = $request->puntos_exp;
        
        $crecimiento->save();

        return redirect()->route('crecimientos.index')->with('success', 'Se ha actualizado el crecimiento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crecimiento = Crecimiento::find($id);
        $crecimiento->delete();
        return redirect()->route('crecimientos.index')->with('success', 'Se ha borrado el crecimiento');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\GrupoHuevo;

class GrupoHuevoController extends Controller
{
    /*
    index: mostrar todos
    store: guardar
    update: actualizar
    destroy: eliminar
    edit: mostrar edicion
    */


    public function index()
    {
        $titlePage = "Grupos Huevo";
        $gruposHuevo = GrupoHuevo::all();
        return view('admin.gruposHuevo.index', ['gruposHuevo' => $gruposHuevo], compact('titlePage'));
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required'
        ]);

        $grupoHuevo = new GrupoHuevo;
        $grupoHuevo->nombre = $request->nombre;
        $grupoHuevo->save();

        return redirect()->route('gruposHuevo.index')->with('success', 'Se ha añadido el grupo huevo');
    }


    public function destroy($id){
        $grupoHuevo = GrupoHuevo::find($id);
        $grupoHuevo->delete();
        return redirect()->route('gruposHuevo.index')->with('success', 'Se ha borrado el grupo huevo');
    }


    public function show($id){
        $grupoHuevo = GrupoHuevo::find($id);
        $titlePage = $grupoHuevo->nombre;
        return view('admin.gruposHuevo.show', ['grupoHuevo' => $grupoHuevo], compact('titlePage'));
    }

    public function update(Request $request, $id){
        $grupoHuevo = GrupoHuevo::find($id);
        
        $grupoHuevo->nombre = $request->nombre;
        $grupoHuevo->save();

        return redirect()->route('gruposHuevo.index')->with('success', 'Grupo huevo actualizado');
    }

    public function create()
    {
        $titlePage = "Crear Grupo Huevo";
        return view('admin.gruposHuevo.crear', compact('titlePage'));
    }
}

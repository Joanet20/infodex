<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Version;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Versiones";
        $versiones = Version::all();
        return view('admin.versiones.index', ['versiones' => $versiones], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Crear Versión";
        return view('admin.versiones.crear', compact('titlePage'));
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
            'nombre' => 'required'
        ]);

        $version = new version;
        $version->nombre = $request->nombre;
        $version->save();


        return redirect()->route('versiones.index')->with('success', 'Se ha añadido la versión');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $version = Version::find($id);
        $titlePage = $version->nombre;
        return view('admin.versiones.show', ['version' => $version], compact('titlePage'));
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
        $version = Version::find($id);
        
        $version->nombre = $request->nombre;
        $version->save();

        return redirect()->route('versiones.index')->with('success', 'Versión actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $version = Version::find($id);
        $version->delete();
        return redirect()->route('versiones.index')->with('success', 'Se ha borrado la versión');
    }
}

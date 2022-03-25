<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Localizacion;
use App\Models\Admin\VersionLocalizacion;

class LocalizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Localizaciones";
        $localizaciones = Localizacion::all();
        return view('admin.localizaciones.index', ['localizaciones' => $localizaciones], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Crear Localización";
        return view('admin.localizaciones.crear', compact('titlePage'));
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

        $localizacion = new Localizacion;
        $versionLocalizacion = new VersionLocalizacion;
        $localizacion->nombre = $request->nombre;
        $versionLocalizacion->version_id = $request->version_id;
        $versionLocalizacion->localizacion_id = $request->localizacion_id;
        $localizacion->save();
        $versionLocalizacion->save();

        return redirect()->route('localizaciones.index')->with('success', 'Se ha añadido la localización');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $localizacion = Localizacion::find($id);
        $titlePage = $localizacion->nombre;
        return view('admin.localizaciones.show', ['localizacion' => $localizacion], compact('titlePage'));
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
        $localizacion = Localizacion::find($id);
        $versiones = Version::all();
        $versionesLocalizacion = VersionLocalizacion::all();

        $localizacion->nombre = $request->nombre;
        $versionLocalizacion->version_id = $request->version_id;
        $versionLocalizacion->localizacion_id = $request->localizacion_id;
        $localizacion->save();
        $versionLocalizacion->save();

        return redirect()->route('localizaciones.index')->with('success', 'Localización actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $localizacion = Localizacion::find($id);
        $localizacion->delete();
        return redirect()->route('localizaciones.index')->with('success', 'Se ha borrado la localización');
    }
}

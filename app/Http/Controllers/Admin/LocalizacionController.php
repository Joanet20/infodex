<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Localizacion;
use App\Models\Admin\VersionLocalizacion;
use App\Models\Admin\Version;
use App\Models\Admin\Region;

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
        $versiones = Version::all();
        $regiones = Region::all();
        return view('admin.localizaciones.crear', ['regiones' => $regiones, 'versiones' => $versiones], compact('titlePage'));
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
        $localizacion->nombre = $request->nombre;
        $localizacion->region_id = $request->region_id;
        $localizacion->save();

        $id_loc = $localizacion->id;

        

        
        $versiones = $request->version_id;
        


        foreach ($versiones as $version) {
            $versionLocalizacion = new VersionLocalizacion;
            $idVers = intval($version);
            $versionLocalizacion->version_id = $idVers;
            $versionLocalizacion->localizacion_id = $id_loc;
            $versionLocalizacion->save();
        }
        
        //dd($versiones);

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
        $versiones = Version::all();
        $regiones = Region::all();
        $versionesLocalizacion = VersionLocalizacion::all();

        $arrayIds = [];

        foreach ($versionesLocalizacion as $vers) {
            if ($vers->localizacion_id == $id) {
                foreach ($versiones as $version) {
                    if ($vers->version_id == $version->id) {
                        $arrayIds[] = $vers->version_id;
                    }
                }
            }
            
        }

        //dd($arrayIds);
        return view('admin.localizaciones.show', ['regiones' => $regiones, 'localizacion' => $localizacion, 'versiones' => $versiones, 'versionesLocalizacion' => $versionesLocalizacion, 'arrayIds' => $arrayIds], compact('titlePage'));
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
        $versionesLocalizacion = VersionLocalizacion::all();

        /*$localizacion->nombre = $request->nombre;
        $versionLocalizacion->version_id = $request->version_id;
        $versionLocalizacion->localizacion_id = $request->localizacion_id;
        $localizacion->save();
        $versionLocalizacion->save();*/

        $arrayIds = [];

        foreach ($versionesLocalizacion as $versLoc) {
            if ($versLoc->localizacion_id == $id) {
                $arrayIds[] = $versLoc->version_id;
            }
        }

        $versionesMarcadas = $request->version_id;

        foreach ($versionesMarcadas as $versMark) {
            $versId = intval($versMark);
            if (!in_array($versId, $arrayIds)) {
                $versionLocalizacion = new VersionLocalizacion;
                $versionLocalizacion->version_id = $versId;
                $versionLocalizacion->localizacion_id = $id;
                $versionLocalizacion->save();
            }
        }

        foreach ($versionesLocalizacion as $versLoc) {
            $versId = intval($versLoc->version_id);
            if (!in_array($versId, $versionesMarcadas) && (in_array($versId, $arrayIds))) {
                $versLoc->delete();
            }
        }

        //dd($versionesMarcadas);


        $localizacion->nombre = $request->nombre;
        $localizacion->region_id = $request->region_id;
        $localizacion->save();

        

        
        /*foreach ($versiones as $version) {
            $versionLocalizacion = new VersionLocalizacion;
            $idVers = intval($version);
            $versionLocalizacion->version_id = $idVers;
            $versionLocalizacion->localizacion_id = $id_loc;
            $versionLocalizacion->save();
        }*/

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

        $versionesLocalizacion = VersionLocalizacion::all();

        foreach ($versionesLocalizacion as $versionLocalizacion) {
            if ($versionLocalizacion->localizacion_id == $localizacion->id) {
                $versionLocalizacion->delete();
            }
        }

        $localizacion->delete();
        return redirect()->route('localizaciones.index')->with('success', 'Se ha borrado la localización');
    }
}

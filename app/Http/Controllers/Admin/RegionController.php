<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Region;
use App\Models\Admin\Version;
use App\Models\Admin\VersionRegion;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Regiones";
        $regiones = Region::all();
        return view('admin.regiones.index', ['regiones' => $regiones], compact('titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Crear Región";
        $versiones = Version::all();
        return view('admin.regiones.crear', ['versiones' => $versiones], compact('titlePage'));
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
        ]);

        $region = new Region;
        $region->nombre = $request->nombre;
        $region->save();

        $id_reg = $region->id;

        $versiones = $request->version_id;

        foreach ($versiones as $version) {
            $versionRegion = new VersionRegion;
            $idVers = intval($version);
            $versionRegion->version_id = $idVers;
            $versionRegion->region_id = $id_reg;
            $versionRegion->save();
        }

        return redirect()->route('regiones.index')->with('success', 'Se ha añadido el ciclo huevo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::find($id);
        $titlePage = $region->nombre;

        $versiones = Version::all();
        $versionesRegion = VersionRegion::all();

        $arrayIds = [];

        foreach ($versionesRegion as $vers) {
            if ($vers->region_id == $id) {
                foreach ($versiones as $version) {
                    if ($vers->version_id == $version->id) {
                        $arrayIds[] = $vers->version_id;
                    }
                }
            }
            
        }

        return view('admin.regiones.show', ['region' => $region, 'versiones' => $versiones, 'versionesRegion' => $versionesRegion, 'arrayIds' => $arrayIds], compact('titlePage'));
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
        $region = Region::find($id);
        $versionesRegion = VersionRegion::all();

        $arrayIds = [];

        foreach ($versionesRegion as $versReg) {
            if ($versReg->region_id == $id) {
                $arrayIds[] = $versReg->version_id;
            }
        }

        $versionesMarcadas = $request->version_id;

        foreach ($versionesMarcadas as $versMark) {
            $versId = intval($versMark);
            if (!in_array($versId, $arrayIds)) {
                $versionRegion = new VersionRegion;
                $versionRegion->version_id = $versId;
                $versionRegion->region_id = $id;
                $versionRegion->save();
            }
        }

        foreach ($versionesRegion as $versReg) {
            $versId = intval($versReg->version_id);
            if (!in_array($versId, $versionesMarcadas) && (in_array($versId, $arrayIds))) {
                $versReg->delete();
            }
        }
        
        $region->nombre = $request->nombre;
        $region->save();

        return redirect()->route('regiones.index')->with('success', 'Ciclo huevo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Region::find($id);


        $versionesRegion = VersionRegion::all();

        foreach ($versionesRegion as $versionRegion) {
            if ($versionRegion->region_id == $region->id) {
                $versionRegion->delete();
            }
        }

        $region->delete();
        return redirect()->route('regiones.index')->with('success', 'Se ha borrado el ciclo huevo');
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\GrupoHuevoController;
use App\Http\Controllers\Admin\CicloHuevoController;
use App\Http\Controllers\Admin\CrecimientoController;
use App\Http\Controllers\Admin\TipoController;
use App\Http\Controllers\Admin\GeneracionController;
use App\Http\Controllers\Admin\VersionController;
use App\Http\Controllers\Admin\MetodoEvolucionController;
use App\Http\Controllers\Admin\ObjetoController;
use App\Http\Controllers\Admin\HabilidadController;
use App\Http\Controllers\Admin\LocalizacionController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\PokedexController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('admin.admin');
});*/



/*Route::get('admin/gruposHuevo', [GrupoHuevoController::class, 'index'])->name('gh');

Route::post('admin/gruposHuevo', [GrupoHuevoController::class, 'store'])->name('gh');


Route::delete('admin/gruposHuevo/{id}', [GrupoHuevoController::class , 'destroy'])->name('gh-destroy');

Route::get('admin/gruposHuevo/{id}', [GrupoHuevoController::class , 'show'])->name('gh-edit');

Route::patch('admin/gruposHuevo/{id}', [GrupoHuevoController::class , 'update'])->name('gh-update');

Route::get('admin/gruposHuevo/crear', [GrupoHuevoController::class, 'create'])->name('gh-crear');*/

// Index
Route::get('/admin', [IndexController::class, 'title']);

// Grupos Huevo
Route::resource('/admin/gruposHuevo', GrupoHuevoController::class);

// Ciclos Huevo
Route::resource('/admin/ciclosHuevo', CicloHuevoController::class);

// Crecimientos
Route::resource('/admin/crecimientos', CrecimientoController::class);

// Tipos
Route::resource('/admin/tipos', TipoController::class);

// Generaciones
Route::resource('/admin/generaciones', GeneracionController::class);

// Versiones
Route::resource('/admin/versiones', VersionController::class);

// Métodos de evolución
Route::resource('/admin/metodosEvolucion', MetodoEvolucionController::class);

// Objetos
Route::resource('/admin/objetos', ObjetoController::class);

// Habilidades
Route::resource('/admin/habilidades', HabilidadController::class);

// Localizaciones
Route::resource('/admin/localizaciones', LocalizacionController::class);

// Regiones
Route::resource('/admin/regiones', RegionController::class);

// Pokedexs
Route::resource('/admin/pokedexs', PokedexController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

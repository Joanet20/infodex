<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Objeto;
use App\Models\Admin\Habilidad;

class Generacion extends Model
{
    //use HasFactory;
    protected $table = 'generacion';

    public function objeto() {
        return $this->hasMany(Objeto::class); 
    }

    public function habilidad() {
        return $this->hasMany(Habilidad::class); 
    }
}

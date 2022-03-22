<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    //use HasFactory;
    protected $table = 'objeto';

    public function generacion() {
        return $this->hasMany(Generacion::class); 
    }
}

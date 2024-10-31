<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maquina extends Model
{
    use SoftDeletes;

    protected $table = 'maquinas';

    protected $fillable = [
        'nombre', 'tipo', 'plazas', 'marca', 'modelo'
    ];

    public function vuelosAvion()
    {
        return $this->hasMany(Vuelo::class, 'avion_id');
    }

    public function vuelosPlaneador()
    {
        return $this->hasMany(Vuelo::class, 'planeador_id');
    }
}

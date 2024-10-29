<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vuelo extends Model
{
    use SoftDeletes;

    protected $table = 'vuelos';

    protected $fillable = [
        'planilla_id', 'tema_id', 'piloto_id', 'avion_id', 
        'remolcador_id', 'planeador_id', 'instructor_id', 
        'tipo_pago_id', 'decolaje', 'corte', 'aterrizaje', 
        'aterrizaje_avion'
    ];

    public function planilla()
    {
        return $this->belongsTo(Planilla::class, 'planilla_id');
    }

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'tema_id');
    }

    public function piloto()
    {
        return $this->belongsTo(User::class, 'piloto_id');
    }

    public function avion()
    {
        return $this->belongsTo(Maquina::class, 'avion_id');
    }

    public function remolcador()
    {
        return $this->belongsTo(User::class, 'remolcador_id');
    }

    public function planeador()
    {
        return $this->belongsTo(Maquina::class, 'planeador_id');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function tipoPago()
    {
        return $this->belongsTo(FormaPago::class, 'tipo_pago_id');
    }
}



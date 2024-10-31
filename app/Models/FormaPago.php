<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormaPago extends Model
{
    use SoftDeletes;

    protected $table = 'formas_pagos';

    protected $fillable = [
        'nombre'
    ];

    public function vuelos()
    {
        return $this->hasMany(Vuelo::class, 'tipo_pago_id');
    }
}

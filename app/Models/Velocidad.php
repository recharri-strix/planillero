<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Velocidad extends Model
{
    use SoftDeletes;

    protected $table = 'viento_vel';

    protected $fillable = [
        'nombre'
    ];

    public function planillas()
    {
        return $this->hasMany(Planilla::class, 'vel_viento_id');
    }
}

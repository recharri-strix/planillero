<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Planilla extends Model
{
    use SoftDeletes;

    protected $table = 'planillas';

    protected $fillable = [
        'fecha', 'jefe_campo_id', 'dir_viento_id', 
        'vel_viento_id', 'temperatura_id', 'nube_id', 
        'plafon_id', 'novedades'
    ];

    public function jefeCampo()
    {
        return $this->belongsTo(User::class, 'jefe_campo_id');
    }

    public function dirViento()
    {
        return $this->belongsTo(DirViento::class, 'dir_viento_id');
    }

    public function velViento()
    {
        return $this->belongsTo(Velocidad::class, 'vel_viento_id');
    }

    public function temperatura()
    {
        return $this->belongsTo(Temperatura::class, 'temperatura_id');
    }

    public function vuelos()
    {
        return $this->hasMany(Vuelo::class, 'planilla_id');
    }
}

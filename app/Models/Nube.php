<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nube extends Model
{
    use SoftDeletes;

    protected $table = 'nubes';

    protected $fillable = [
        'nombre'
    ];

    public function planillas()
    {
        return $this->hasMany(Planilla::class, 'nube_id');
    }
}

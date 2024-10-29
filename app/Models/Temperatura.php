<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Temperatura extends Model
{
    use SoftDeletes;

    protected $table = 'temperaturas';

    protected $fillable = [
        'nombre'
    ];

    public function planillas()
    {
        return $this->hasMany(Planilla::class, 'temperatura_id');
    }
}

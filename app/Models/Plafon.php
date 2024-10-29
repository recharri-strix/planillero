<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plafon extends Model
{
    use SoftDeletes;

    protected $table = 'plafon';

    protected $fillable = [
        'nombre'
    ];

    public function planillas()
    {
        return $this->hasMany(Planilla::class, 'plafon_id');
    }
}

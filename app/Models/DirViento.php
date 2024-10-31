<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DirViento extends Model
{
    use SoftDeletes;

    protected $table = 'viento_dir';

    protected $fillable = [
        'nombre'
    ];

    public function planillas()
    {
        return $this->hasMany(Planilla::class, 'dir_viento_id');
    }
}

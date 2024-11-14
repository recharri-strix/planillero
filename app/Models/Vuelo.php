<?php

namespace App\Models;

use Carbon\Carbon;
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
        'aterrizaje_avion', 'estado_id', 'pago', 'bau'
    ];

    public function getHoraCorteAttribute()
    {
        return $this->corte ? Carbon::parse($this->corte)->format('H:i') : null;
    }

    // Accesor para hora_aterrizaje
    public function getHoraAterrizajeAttribute()
    {
        return $this->aterrizaje ? Carbon::parse($this->aterrizaje)->format('H:i') : null;
    }

    public function getHoraDecolajeAttribute()
    {
        return $this->decolaje ? Carbon::parse($this->decolaje)->format('H:i') : null;
    }

    public function getHoraAterrizajeAvionAttribute()
    {
        return $this->aterrizaje_avion ? Carbon::parse($this->aterrizaje_avion)->format('H:i') : null;
    }

    public function getHoraRemolqueAttribute()
    {
        if ($this->corte && $this->decolaje) {
            $corte = Carbon::parse($this->corte);
            $decolaje = Carbon::parse($this->decolaje);

            $diferencia = $corte->diff($decolaje);

            return $diferencia->format('%H:%I');
        }

        return null;
    }

    public function getHoraLibradoAttribute()
    {
        if ($this->corte && $this->aterrizaje) {
            $corte = Carbon::parse($this->corte);
            $aterrizaje = Carbon::parse($this->aterrizaje);

            $diferencia = $corte->diff($aterrizaje);

            return $diferencia->format('%H:%I');
        }

        return null;
    }

    public function getHoraParcialAttribute()
    {
        if ($this->aterrizaje_avion && $this->decolaje) {
            $aterrizaje_avion = Carbon::parse($this->aterrizaje_avion);
            $decolaje = Carbon::parse($this->decolaje);

            $diferencia = $decolaje->diff($aterrizaje_avion);

            return $diferencia->format('%H:%I');
        }

        return null;
    }
    public function getTemaNombreAttribute()
    {
        $tema = $this->tema()->first();
        return $tema ? $tema->nombre : "";
    }

    public function getInstructorAttribute()
    {
        return $this->instructor()->first() ?: null;
    }
    
    public function getFormaPagoAttribute()
    {
        return $this->tipoPago()->first() ?: null;
    }

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



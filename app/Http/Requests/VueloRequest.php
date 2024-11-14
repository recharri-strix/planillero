<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use App\Rules\TimeFormat;

class VueloRequest
{
    public static function sanitize($data)
    {
        $data['bau'] = !empty($data['bau']) ? htmlspecialchars(strip_tags($data['bau'])) : null;
        $data['pago'] = !empty($data['pago']) ? htmlspecialchars(strip_tags($data['pago'])) : null;

        return $data;
    }

    public static function validate($request)
    {
        $data = self::sanitize($request->all());

        return Validator::make($data, [
            'id' => 'nullable',
            'planilla_id' => 'required',
            'tema_id' => 'nullable|exists:temas,id',
            'piloto_id' => 'required|exists:users,id',
            'avion_id' => 'required|exists:maquinas,id',
            'remolcador_id' => 'required|exists:users,id',
            'planeador_id' => 'required|exists:maquinas,id',
            'instructor_id' => 'nullable|exists:users,id',
            'tipo_pago_id' => 'nullable|exists:formas_pagos,id',
            'decolaje' => ['nullable', new TimeFormat],
            'corte' => [
                'nullable',
                new TimeFormat,
                function ($attribute, $value, $fail) use ($data) {
                    if ((empty($data['decolaje']) && !empty($value)) || $value < $data['decolaje']) {
                        $fail('La hora de Corte debe ser mayor que la hora de Decolaje.');
                    }
                }
            ],
            'aterrizaje' => [
                'nullable',
                new TimeFormat,
                function ($attribute, $value, $fail) use ($data) {
                    if ((empty($data['corte']) && !empty($value)) || $value < $data['corte']) {
                        $fail('La hora de Aterrizaje debe ser mayor que la hora de Corte.');
                    }
                }
            ],
            'aterrizaje_avion' => ['nullable', new TimeFormat],
            'bau' => 'nullable|string|max:100',
            'pago' => 'nullable|string|max:100'
        ])->validate();
    }

    public static function formatFields($data)
    {
        $fields = ['decolaje', 'corte', 'aterrizaje', 'aterrizaje_avion'];
        foreach ($fields as $field) {
            if (!empty($data[$field])) {
                $data[$field] = now()->format('Y-m-d') . ' ' . $data[$field] . ':00';
            } else {
                $data[$field] = null;
            }
        }
        return $data;
    }
}

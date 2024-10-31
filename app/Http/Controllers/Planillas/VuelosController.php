<?php

namespace App\Http\Controllers\Planillas;

use App\Models\Vuelo;
use App\Models\Planilla;
use App\Models\Tema;
use App\Models\User;
use App\Models\Maquina;
use App\Models\FormaPago;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VuelosController extends Controller
{
    /**
     * Muestra una lista de vuelos en una tabla.
     */
    public function index(int $planilla_id)
    {
        // Obtener todos los vuelos con relaciones para mostrar datos completos
        $vuelos = Vuelo:: where('planilla_id', $planilla_id)
                ->orderBy('created_at', 'desc')
                ->with(['planilla', 'piloto', 'avion', 'remolcador', 'planeador', 'instructor', 'tema'])->paginate(20);

        return view('vuelos.index', compact('vuelos', "planilla_id"));
    }

    /**
     * Muestra el formulario para crear un nuevo vuelo.
     */
    public function nueva(int $planilla_id)
    {
        $temas = Tema::all();
        $pilotos = User::get();
        $aviones = Maquina::where("tipo", "avion")->get();
        $remolcadores = User::get();
        $planeadores = Maquina::where("tipo", "planeador")->get();
        $instructores = User::get();
        $tiposPago = FormaPago::all();

        // Retornar la vista con las variables cargadas
        return view('vuelos.create', compact(
            'temas',
            'pilotos',
            'aviones',
            'remolcadores',
            'planeadores',
            'instructores',
            'tiposPago',
            'planilla_id'
        ));
    }

    /**
     * Almacena un nuevo vuelo en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'planilla_id' => 'required',
            'tema_id' => 'required|exists:temas,id',
            'piloto_id' => 'required|exists:users,id',
            'avion_id' => 'required|exists:maquinas,id',
            'remolcador_id' => 'required|exists:maquinas,id',
            'planeador_id' => 'required|exists:maquinas,id',
            'instructor_id' => 'required|exists:users,id',
            'tipo_pago_id' => 'required|exists:formas_pagos,id',
            'decolaje' => 'nullable|date',
            'corte' => 'nullable|date',
            'aterrizaje' => 'nullable|date',
            'aterrizaje_avion' => 'nullable|date',
        ]);

        // Crear un nuevo vuelo con los datos del formulario
        Vuelo::create($request->all());

        // Redirigir al índice de vuelos con un mensaje de éxito
        return redirect()->route('vuelos.index', $request->planilla_id)->with('success', 'Vuelo creado correctamente.');
    }

}

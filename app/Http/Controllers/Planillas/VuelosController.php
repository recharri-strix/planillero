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
use App\Rules\TimeFormat;
use Barryvdh\DomPDF\Facade\Pdf;

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
                ->with(['planilla', 'piloto', 'avion', 'remolcador', 'planeador', 'instructor', 'tema'])->paginate(30);

     return view('vuelos.index', compact('vuelos', "planilla_id"));
    }

    /**
     * Muestra el formulario para crear un nuevo vuelo.
     */
    public function nueva(int $planilla_id)
    {
        $temas = Tema::get();
        $pilotos = User::get();
        $aviones = Maquina::where("tipo", "avion")->get();
        $remolcadores = User::get();
        $planeadores = Maquina::where("tipo", "planeador")->get();
        $instructores = User::get();
        $tiposPago = FormaPago::all();
        $vuelo = new Vuelo();

        // Retornar la vista con las variables cargadas
        return view('vuelos.create', compact(
            'temas',
            'pilotos',
            'aviones',
            'remolcadores',
            'planeadores',
            'instructores',
            'tiposPago',
            'planilla_id',
            'vuelo'
        ));
    }

    /**
     * Muestra el formulario para editar un nuevo vuelo ya cargado.
     */
    public function editar(int $vuelo_id)
    {
        $vuelo = Vuelo::find($vuelo_id);
        $planilla_id = $vuelo->planilla_id;
        $temas = Tema::get();
        $pilotos = User::get();
        $aviones = Maquina::where("tipo", "avion")->get();
        $remolcadores = User::get();
        $planeadores = Maquina::where("tipo", "planeador")->get();
        $instructores = User::get();
        $tiposPago = FormaPago::all();

        // Retornar la vista con las variables cargadas
        return view('vuelos.editar', compact(
            'vuelo',
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
            'id' => 'nullable',
            'planilla_id' => 'required',
            'tema_id' => 'required|exists:temas,id',
            'piloto_id' => 'required|exists:users,id',
            'avion_id' => 'required|exists:maquinas,id',
            'remolcador_id' => 'required|exists:maquinas,id',
            'planeador_id' => 'required|exists:maquinas,id',
            'instructor_id' => 'required|exists:users,id',
            'tipo_pago_id' => 'required|exists:formas_pagos,id',
            'decolaje' => ['nullable', new TimeFormat],
            'corte' => ['nullable', new TimeFormat],
            'aterrizaje' => ['nullable', new TimeFormat],
            'aterrizaje_avion' => ['nullable', new TimeFormat],
        ]);

        $data = $request->all();
        // dd($data);
        $fields = ['decolaje', 'corte', 'aterrizaje', 'aterrizaje_avion'];
        foreach ($fields as $field) {
            if (!empty($data[$field])) {
                $data[$field] = now()->format('Y-m-d') . ' ' . $data[$field] . ':00';
            } else {
                $data[$field] = null;
            }
        }

        if ($request->has("id")) {
            $vuelo = Vuelo::find($request->id);
            $vuelo->update($data);
        } else {
            Vuelo::create($data);
        }

        // Redirigir al índice de vuelos con un mensaje de éxito
        return redirect()->route('vuelos.index', $request->planilla_id)->with('success', 'Vuelo creado correctamente.');
    }

    public function imprimir(int $id)
    {

        $vuelos = Vuelo::with(['tema', 'piloto', 'avion', 'remolcador', 'planeador', 'instructor', 'tipoPago'])
        ->where('planilla_id', $id)
        ->get();
        $planilla = Planilla::find($id);

        $pdf = Pdf::loadView('reportes.vuelosRpt', ['vuelos' => $vuelos, 'planilla' => $planilla]);
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('reporte_vuelos.pdf');
        
    }

}

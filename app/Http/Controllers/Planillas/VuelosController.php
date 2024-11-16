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
use App\Http\Requests\VueloRequest;

class VuelosController extends Controller
{
    /**
     * Muestra una lista de vuelos en una tabla.
     */
    public function index(int $planilla_id)
    {
        // Obtener todos los vuelos con relaciones para mostrar datos completos
        $planilla = Planilla::find($planilla_id);
        $vuelos = Vuelo:: where('planilla_id', $planilla_id)
            ->orderBy('created_at', 'desc')
            ->with(['planilla', 'piloto', 'avion', 'remolcador', 'planeador', 'instructor', 'tema'])->paginate(30);

        return view('vuelos.index', compact('vuelos', "planilla"));
    }

    /**
     * Muestra el formulario para crear un nuevo vuelo.
     */
    public function nueva(int $planilla_id)
    {
        $temas = Tema::get();
        $pilotos = User::orderby('name', 'asc')->get();
        $aviones = Maquina::where("tipo", "avion")->get();
        $remolcadores = User::where('tipo', 'like', '%REM%')->get();
        $planeadores = Maquina::where("tipo", "planeador")->get();
        $instructores = User::where('tipo', 'like', '%INS%')->get();
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
        $remolcadores = User::where('tipo', 'like', '%REM%')->get();
        $planeadores = Maquina::where("tipo", "planeador")->get();
        $instructores = User::where('tipo', 'like', '%INS%')->get();
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
        // Anulación del vuelo
        if ($request->has('anular') && $request->has('id')) {
            $vuelo = Vuelo::find($request->id);
            $vuelo->estado_id = 3;
            $vuelo->save();
    
            return redirect()->route('vuelos.index', $vuelo->planilla_id)->with('success', 'Vuelo anulado correctamente.');
        }
    
        // Validación y sanitización de datos
        $validated = VueloRequest::validate($request);
        $data = VueloRequest::formatFields($validated);
    
        // Actualización o creación del vuelo
        $vuelo = $request->has("id") ? Vuelo::find($request->id) : new Vuelo;
        $vuelo->fill($data);
        $vuelo->save();
    
        // Lógica para finalizar el vuelo
        if ($request->has('finalizar')) {
            foreach ($validated as $key => $valor) {
                if ( !in_array($key, ['bau','pago','id','instructor_id']) && empty($valor) ) {
                    return redirect()->route('vuelos.index', $vuelo->planilla_id)
                                     ->with('error', 'Error, No puede finalizar el vuelo, solo puede dejar sin cargar el Instructor.');
                }
            }
            $vuelo->estado_id = 2;
            $vuelo->save();
    
            return redirect()->route('vuelos.index', $vuelo->planilla_id)->with('success', 'Vuelo finalizado correctamente.');
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

    public function finalizar(int $id)
    {

        $vuelo = Vuelo::find($id);
        $vuelo->estado_id = 2;
        $vuelo->save();

        return redirect()->route('vuelos.index', $vuelo->planilla_id)->with('success', 'Vuelo finalizado correctamente.');
    }

    public function anular(int $id)
    {
        $vuelo = Vuelo::find($id);
        $vuelo->estado_id = 3;
        $vuelo->save();

        return redirect()->route('vuelos.index', $vuelo->planilla_id)->with('success', 'Vuelo anulado correctamente.');
    }
}

<?php

namespace App\Http\Controllers\Planillas;

use App\Models\Nube;
use App\Models\User;
use App\Models\Vuelo;
use App\Models\Plafon;
use App\Models\Planilla;
use App\Models\DirViento;
use App\Models\Temperatura;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Velocidad;

class PlanillasController extends Controller
{
    /**
     * Muestra una lista de planillas en una tabla.
     */
    public function index()
    {
        $jefeCampos = User::orderby('name', 'asc')->get();
        $jefe_campo_id = "" ;
        $fecha = "";
        $planillas = Planilla::with(['jefeCampo', 'dirViento', 'velViento', 'temperatura'])
                ->orderBy('created_at', 'desc')
                ->take(30)
                ->paginate(10);

        return view('planillas.index', compact('planillas', 'jefeCampos', 'jefe_campo_id', 'fecha'));
    }

    /**
     * Muestra el formulario para crear una nueva planilla.
     */
    public function nueva()
    {
        $jefeCampos = User::orderby('name', 'asc')->get();
        $direccionesViento = DirViento::orderby('nombre', 'asc')->get();
        $velocidadesViento = Velocidad::orderby('nombre', 'asc')->get();
        $temperaturas = Temperatura::orderby('nombre', 'asc')->get();
        $nubes = Nube::orderby('nombre', 'asc')->get();
        $plafons = Plafon::orderby('nombre', 'asc')->get();
        
        return view('planillas.create', compact('jefeCampos', 'direccionesViento', 'velocidadesViento', 'temperaturas', 'nubes', 'plafons'));
    }

    public function store(Request $request, $id = null)
    {
        // Validar datos
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'jefe_campo_id' => 'required|exists:users,id',
            'dir_viento_id' => 'nullable|exists:viento_dir,id',
            'vel_viento_id' => 'nullable|exists:viento_vel,id',
            'temperatura_id' => 'nullable|exists:temperaturas,id',
            'nube_id' => 'nullable|exists:nubes,id',
            'plafon_id' => 'nullable|exists:plafon,id',
            'novedades' => 'nullable|string|max:1000'
        ]);

        // Crear o actualizar planilla
        $planilla = $id ? Planilla::findOrFail($id) : new Planilla();
        $planilla->fecha = $validatedData['fecha'];
        $planilla->jefe_campo_id = $validatedData['jefe_campo_id'];
        $planilla->dir_viento_id = $validatedData['dir_viento_id'];
        $planilla->vel_viento_id = $validatedData['vel_viento_id'];
        $planilla->temperatura_id = $validatedData['temperatura_id'];
        $planilla->nube_id = $validatedData['nube_id'];
        $planilla->plafon_id = $validatedData['plafon_id'];
        $planilla->novedades = $validatedData['novedades'];

        // Guardar planilla en la base de datos
        $planilla->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('planillas.index')->with('success', 'Planilla guardada exitosamente.');
    }

    // /**
    //  * Muestra la lista de vuelos relacionados con una planilla específica.
    //  *
    //  * @param int $id
    //  * @return \Illuminate\View\View
    //  */
    // public function vuelos($id)
    // {
    //     // Obtener los vuelos relacionados con la planilla específica
    //     $vuelos = Vuelo::where('planilla_id', $id)->with(['piloto', 'avion', 'remolcador', 'planeador', 'instructor', 'tema'])->get();

    //     return view('vuelos.index', compact('vuelos'));
    // }
}

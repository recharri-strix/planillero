<?php

namespace App\Http\Controllers\Planillas;

use Carbon\Carbon;
use App\Models\Nube;
use App\Models\User;
use App\Models\Vuelo;
use App\Models\Plafon;
use App\Models\Planilla;
use App\Models\DirViento;
use App\Models\Velocidad;
use App\Models\Temperatura;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $planilla = new Planilla(); 
        
        return view('planillas.create', compact('planilla', 'jefeCampos', 'direccionesViento', 'velocidadesViento', 'temperaturas', 'nubes', 'plafons'));
    }
    
    /**
     * Muestra el formulario para editar una planilla.
     */
    public function editar($id)
    {
        $planilla = Planilla::with(['jefeCampo', 'dirViento', 'velViento', 'temperatura', 'nube', 'plafon'])
                ->where('id', $id)
                ->first();
        $jefeCampos = User::orderby('name', 'asc')->get();
        $direccionesViento = DirViento::orderby('nombre', 'asc')->get();
        $velocidadesViento = Velocidad::orderby('nombre', 'asc')->get();
        $temperaturas = Temperatura::orderby('nombre', 'asc')->get();
        $nubes = Nube::orderby('nombre', 'asc')->get();
        $plafons = Plafon::orderby('nombre', 'asc')->get();
        
        return view('planillas.editar', compact('planilla', 'jefeCampos', 'direccionesViento', 'velocidadesViento', 'temperaturas', 'nubes', 'plafons'));
    }

    public function store(Request $request)
    {
        // if($request->has('anular')) {

        // }

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

        // valido que no se ingrese una planilla para un día existente
        $fecha = $request->fecha;
        $startOfDay = Carbon::parse($fecha)->startOfDay();
        $endOfDay = Carbon::parse($fecha)->endOfDay();
        $planilla = Planilla::whereBetween('fecha', [$startOfDay, $endOfDay])->first();
        
        if ($planilla) {
            if ($request->id === null) { 
                return back()->with('error', "Intenta crear una planilla para el día ".$fecha.", pero ya existe una planilla para ese día.");            
            }
            if ($planilla->id <> $request->id) { 
                return back()->with('error', "Intenta modificar la fecha de una planilla (".$fecha."), pero ya existe una planilla para ese día.");            
            }
        }

        // Crear o actualizar planilla
        if ($request->id) {
            $planilla = Planilla::findOrFail($request->id);
        } else {
            $planilla = new Planilla();
        }

        $planilla->fecha = $validatedData['fecha'];
        $planilla->jefe_campo_id = $validatedData['jefe_campo_id'];
        $planilla->dir_viento_id = $validatedData['dir_viento_id'];
        $planilla->vel_viento_id = $validatedData['vel_viento_id'];
        $planilla->temperatura_id = $validatedData['temperatura_id'];
        $planilla->nube_id = $validatedData['nube_id'];
        $planilla->plafon_id = $validatedData['plafon_id'];
        $planilla->novedades = htmlspecialchars($validatedData['novedades'], ENT_QUOTES, 'UTF-8');
        $planilla->save();

        return redirect()->route('planillas.index')->with('success', 'Planilla guardada exitosamente.');
    }
    
    public function filtrar(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
        ]);
    
        $jefeCampos = User::orderBy('name', 'asc')->get();
        $jefe_campo_id = "";
        $fecha = $request->input('fecha'); 
    
        $startOfDay = Carbon::parse($fecha)->startOfDay();
        $endOfDay = Carbon::parse($fecha)->endOfDay();
        $planillas = Planilla::with(['jefeCampo', 'dirViento', 'velViento', 'temperatura'])
            ->whereBetween('fecha', [$startOfDay, $endOfDay])
            ->orderBy('fecha', 'desc')
            ->take(30)
            ->paginate(10);
    
        return view('planillas.index', compact('planillas', 'jefeCampos', 'jefe_campo_id', 'fecha'));
    }
    

}

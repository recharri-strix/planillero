<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Planilla;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarEstadoPlanilla
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');
        $planilla = Planilla::find($request->id);
        if ($planilla && $planilla->estado_id == 2) {
            // Redirige o responde con un mensaje de error si el estado es 2
            return response()->view('errors.403');
        }
    
        return $next($request);
    }
}

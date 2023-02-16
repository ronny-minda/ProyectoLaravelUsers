<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Roles;

class VerificarDatosMiddleware
{
    public function handle($request, Closure $next)
    {

        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();

        if (empty($user->fecha_nacimiento) || empty($user->direccion_domicilio) || empty($user->telefono_movil) || empty($user->estado_vacunacion)) {
            return redirect('/dashboard/completarDatos')->with('mensaje', 'Debe completar todos los datos antes de continuar.');
        }

        return $next($request);
    }
}

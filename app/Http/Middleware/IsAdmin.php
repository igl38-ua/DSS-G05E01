<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica que el usuario esté autenticado y tenga el rol de admin.
        // Aquí se asume que tienes una propiedad 'role' en tu modelo User.
        if (!Auth::check() || Auth::user()->rol !== 'admin') {
            abort(403, 'Acceso no autorizado');
        }
        return $next($request);
    }
}

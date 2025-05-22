<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class IsAdmin
{
    
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica que el usuario esté autenticado y tenga el rol de admin.
        if (!Auth::check() || Auth::user()->rol !== 'admin') {
            abort(403, 'Acceso no autorizado');
        }
        return $next($request);
    }
}

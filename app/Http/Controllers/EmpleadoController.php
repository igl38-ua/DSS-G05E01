<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;


class EmpleadoController extends Controller
{
    /**
     * Guarda un nuevo empleado en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre'         => 'required|string|max:50',
            'email'          => 'required|string|email|max:100',
            'direccion'      => 'nullable|string|max:255',
            'horarioTrabajo' => 'nullable|string|max:50',
            'nomina'         => 'required|numeric',
        ]);

        $empleado = Empleado::create($validatedData);
        return response()->json($empleado, 201);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;


class EmpleadoController extends Controller
{
    /**
     * Muestra el listado de empleados con paginación y ordenación por nombre.
     */
    public function index(Request $request)
    {
        $numero = $this->paginacion;
        // Ordenar por nombre (por defecto)
        $sort = $request->get('sort', 'nombre');
        $direction = $request->get('direction', 'asc');
        $empleados = Empleado::orderBy($sort, $direction)->paginate($numero);
        return view('empleados.index', compact('empleados', 'sort', 'direction'));
    }

    /**
     * Muestra el formulario para crear un nuevo empleado.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Guarda un nuevo empleado en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre'        => 'required|max:50',
            'email'         => 'required|email|ends_with:.com,.es',
            'horarioTrabajo'=> 'required|max:50',
            'nomina'        => 'required|numeric',
            'direccion'     => 'required|max:50',
            // 'direccion' es opcional
        ]);

        Empleado::create($validatedData);
        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un empleado existente.
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Actualiza un empleado existente en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $validatedData = $request->validate([
            'nombre'        => 'required|max:50',
            'email'         => 'required|email|ends_with:.com,.es',
            'horarioTrabajo'=> 'required|max:50',
            'nomina'        => 'required|numeric',
            'direccion'     => 'required|max:50',
        ]);

        $empleado->update($validatedData);
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    /**
     * Elimina un empleado de la base de datos.
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}

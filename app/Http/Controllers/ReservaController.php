<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ID_Usuario' => 'required|exists:usuarios,id',
            'ID_Clase' => 'required|array',
            'ID_Clase.*' => 'exists:clase,id',
            'ID_Fecha' => 'required|date',
        ]);

        foreach ($validated['ID_Clase'] as $claseId) {
            Reserva::create([
                'ID_Usuario' => $validated['ID_Usuario'],
                'ID_Clase' => $claseId,
                'ID_Fecha' => $validated['ID_Fecha'],
            ]);
        }

        return redirect()->route('reservas.index')->with('success', 'Reservas realizadas correctamente.');
    }

    public function edit($id)
    {
        // Obtener el usuario por su ID
        $usuario = Usuario::findOrFail($id);

        // Obtener las clases asociadas al usuario (puede depender de tu modelo y relaciones)
        $clases = Clase::where('usuario_id', $id)->get(); // Ajusta según tu lógica

        // Pasar los datos a la vista
        return view('usuarios.edit', [
            'usuario' => $usuario,
            'clases' => $clases, // Pasar las clases a la vista
        ]);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $validatedData = $request->validate([
            'nombre'            => 'required|max:50',
            'email'             => 'required|email|unique:usuarios,email,' . $usuario->id,
            'telefono'          => 'nullable|max:15',
            'contrasena'        => 'required|min:6',
            'fecha_inscripcion' => 'required|date',
            'clase_id'          => 'array', // Validar que sea un array de IDs
            'clase_id.*'        => 'exists:clases,id', // Validar que cada ID exista en la tabla clases
        ]);

        // Actualizar los datos del usuario
        $usuario->update($validatedData);

        // Preparar los datos para sincronizar en la tabla intermedia
        $clasesConFecha = [];
        foreach ($request->input('clase_id', []) as $claseId) {
            $clasesConFecha[$claseId] = ['ID_Fecha' => now()]; // Agregar la fecha actual
        }

        // Sincronizar las clases seleccionadas con datos adicionales
        $usuario->clases()->sync($clasesConFecha);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }
}
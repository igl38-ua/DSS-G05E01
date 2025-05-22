<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ReservaController extends Controller
{
    //public function __construct(){
        // Sintaxis correcta para el middleware
      //  $this->middleware('auth');
    //}

    public function store(Request $request)
    {
        $request->merge(['fecha' => now()->toDateString()]);
        
        // Validación, incluyendo la fecha
        $validated = $request->validate([
            'ID_Clase' => 'required|exists:clase,id',
            'fecha'    => 'required|date',
        ]);

        $userId  = Auth::id();
        $claseId = $validated['ID_Clase'];
        $fecha   = $validated['fecha'];

        // Evitar reservas duplicadas en la misma fecha
        if (Reserva::where('ID_Usuario', $userId)
                   ->where('ID_Clase', $claseId)
                   ->where('fecha', $fecha)
                   ->exists()) {
            return back()->with('error', 'Ya has reservado esta clase en esa fecha');
        }

        // Verificar capacidad
        $clase = Clase::withCount('reservas')->findOrFail($claseId);
        if ($clase->capacidad_max && $clase->reservas_count >= $clase->capacidad_max) {
            return back()->with('error', 'La clase está llena');
        }

        // Crear la reserva con fecha específica
        Reserva::create([
            'ID_Usuario' => $userId,
            'ID_Clase'   => $claseId,
            'fecha'      => now(),
        ]);

        return back()->with('success', 'Reserva realizada con éxito');
    }

    public function edit($id)
    {
        // Obtener el usuario por su ID
        $usuario = Usuario::findOrFail($id);

        // Obtener las clases asociadas al usuario
        $clases = Clase::where('usuario_id', $id)->get(); 

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
            'clase_id'          => 'array',
            'clase_id.*'        => 'exists:clases,id',
        ]);

        // Actualizar los datos del usuario
        $usuario->update($validatedData);

        // Preparar los datos para sincronizar en la tabla intermedia
        $clasesConFecha = [];
        foreach ($request->input('clase_id', []) as $claseId) {
            $clasesConFecha[$claseId] = ['ID_Fecha' => now()];
        }

        // Sincronizar las clases seleccionadas con datos adicionales
        $usuario->clases()->sync($clasesConFecha);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified reservation from storage.
     */
    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);

        // Sólo el usuario propietario puede cancelar
        if ($reserva->ID_Usuario !== Auth::id()) {
            abort(403, 'Acción no autorizada.');
        }

        $reserva->delete();

        return back()->with('success', 'Reserva cancelada correctamente.');
    }
}
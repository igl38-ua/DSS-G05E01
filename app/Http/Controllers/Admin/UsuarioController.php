<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Controllers\Controller;
use App\Models\Clase;

class UsuarioController extends Controller
{
    /**
     * Muestra el listado de usuarios con paginación y ordenación.
     */
    public function index(Request $request)
    {
        $numero = $this->paginacion;
        // Permite ordenar por nombre o fecha_inscripcion, por defecto ordena por nombre
        $sort = $request->get('sort', 'nombre');
        $direction = $request->get('direction', 'asc');
        if ($sort === 'nombre') {
            $usuarios = Usuario::orderByRaw("CAST(substr(nombre, 8) AS INTEGER) $direction")->paginate($numero);
        } else {
            $usuarios = Usuario::orderBy($sort, $direction)->paginate($numero);
        }

        return view('admin.usuarios.index', compact('usuarios', 'sort', 'direction'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Guarda un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre'            => 'required|max:50',
            'email'             => 'required|email|unique:usuario,email|ends_with:.com,.es',
            'telefono'          => 'nullable|max:15',
            'contrasena'        => 'required|min:6',
            'fecha_inscripcion' => 'required|date',
        ]);

        Usuario::create($validatedData);
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un usuario existente.
     */
    public function edit($id)
    {
        $usuario = Usuario::with('clases')->findOrFail($id); // Carga el usuario con sus clases asociadas

        // Clases a las que el usuario ya está apuntado
        $clasesApuntadas = $usuario->clases;

        // Clases disponibles (no asociadas al usuario)
        $clasesDisponibles = Clase::whereNotIn('id', $clasesApuntadas->pluck('id'))->get();

        return view("admin.usuarios.edit", compact('usuario', 'clasesApuntadas', 'clasesDisponibles'));
    }

    /**
     * Actualiza un usuario existente en la base de datos.
     */

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
         ]);
     
         // Actualizar los datos del usuario
         $usuario->update($validatedData);
     
         // Sincronizar las clases seleccionadas en la tabla intermedia
         $usuario->clases()->sync($request->input('clase_id', []));
     
         return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
     }

    /**
     * Elimina un usuario de la base de datos.
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }

    
}

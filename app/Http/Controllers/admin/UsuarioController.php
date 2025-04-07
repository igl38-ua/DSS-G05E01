<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

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

        return view('usuarios.index', compact('usuarios', 'sort', 'direction'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        return view('usuarios.create');
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
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un usuario existente.
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Actualiza un usuario existente en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $validatedData = $request->validate([
            'nombre'            => 'required|max:50',
            'email'             => 'required|email|ends_with:.com,.es'.$usuario->id,
            'telefono'          => 'nullable|max:15',
            'contrasena'        => 'required|min:6',
            'fecha_inscripcion' => 'required|date',
        ]);

        $usuario->update($validatedData);
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Elimina un usuario de la base de datos.
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}

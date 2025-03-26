<?php

namespace App\Http\Controllers; // ¡Namespace exacto!

use App\Models\Clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    public function index(Request $request){
        // Búsqueda combinada (nombre y JAM)
        $search = $request->input('search');
        
        $clases = Clase::when($search, function ($query, $search) {
            return $query->where('nombre', 'like', "%{$search}%")->orWhere('jam', 'like', "%{$search}%");
        })
        ->orderBy('nombre') // Orden por defecto
        ->paginate(10); // Paginación (10 items por página)

        return view('clases.index', compact('clases', 'search'));
    }

    public function create(){
        return view('clases.create');
    }   

    public function store(Request $request){
        // Validación
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'capacidad_max' => 'required|integer|min:1',
            'horario' => 'required|date_format:H:i',
            'jam' => 'nullable|string|max:50',
        ]);

        // Crear la clase
        Clase::create($validated);

        return redirect()->route('clases.index')->with('success', 'Clase creada correctamente.');
    }

    public function edit(Clase $clase){
        return view('clases.edit', compact('clase'));
    }

    public function update(Request $request, Clase $clase){
        // Misma validación que en store()
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'capacidad_max' => 'required|integer|min:1',
            'horario' => 'required|date_format:H:i',
            'jam' => 'nullable|string|max:50',
        ]);

        $clase->update($validated);

        return redirect()->route('clases.index')->with('success', 'Clase actualizada correctamente.');
    }
}

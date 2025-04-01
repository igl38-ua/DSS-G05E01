<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
{

    public function edit($id){
        $clase = Clase::findOrFail($id);
        return view('clases.edit', compact('clase'));
    }

    public function index(Request $request){

        $numero = $this->paginacion;
        // Parámetros de ordenación
        $sortField = $request->get('sort', 'id');
        $sortDirection = $request->get('direction', 'asc');
        
        // Búsqueda combinada
        $search = $request->input('search');
        $searchJam = $request->input('search_jam');
    
        $query = Clase::query();
    
        // Aplicar búsquedas
        if ($search) {
            $query->where('nombre', 'like', "%{$search}%");
        }
        
        if ($searchJam) {
            $query->where('jam', 'like', "%{$searchJam}%");
        }
    
        // Aplicar ordenación
        if (in_array($sortField, ['nombre', 'capacidad_max'])) {
            $query->orderBy($sortField, $sortDirection);
        }
    
        $clases = $query->paginate($numero);
    
        return view('clases.index', compact('clases', 'sortField', 'sortDirection', 'search', 'searchJam'));
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

    public function update(Request $request, $id){
        $clase = Clase::findOrFail($id);
        
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

    public function destroy($id){
        $clase = Clase::findOrFail($id);
        $clase->delete();

        return redirect()->route('classes.index')->with('success', 'Clase eliminada correctamente.');
    }

}

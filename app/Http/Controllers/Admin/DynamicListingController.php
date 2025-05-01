<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;

class DynamicListingController extends Controller
{
    // Mapeo de entidades disponibles: clave => clase del modelo
    protected $entities = [
        'Empleado'             => \App\Models\Empleado::class,
        'Clase'                => \App\Models\Clase::class,
        'Monitor'              => \App\Models\Monitor::class,
        'EntrenadorPersonal'   => \App\Models\EntrenadorPersonal::class,
        'Usuario'              => \App\Models\Usuario::class,
        'Reserva'              => \App\Models\Reserva::class,
        'Fecha'                => \App\Models\Fecha::class,
    ];

    public function index(Request $request)
    {
        $numero = $this->paginacion;
        // Obtener la entidad seleccionada (por defecto "Usuario")
        $selectedEntity = $request->get('entity', 'Usuario');

        if (!array_key_exists($selectedEntity, $this->entities)) {
            $selectedEntity = 'Usuario';
        }

        // Obtener la clase del modelo correspondiente
        $modelClass = $this->entities[$selectedEntity];
        // Instanciar el modelo para conocer la tabla
        $model = new $modelClass;
        // Obtener la lista de columnas de la tabla de la entidad
        $columns = Schema::getColumnListing($model->getTable());

        $records = $modelClass::paginate($numero);

        return view('admin.dynamic.index', [
            'selectedEntity' => $selectedEntity,
            'columns'        => $columns,
            'records'        => $records,
            'entities'       => $this->entities,
        ]);
    }

    public function destroy(Request $request, $entity, $id)
    {
        if (!array_key_exists($entity, $this->entities)) {
            return redirect()->back()->with('error', 'Entidad inválida.');
        }
        $modelClass = $this->entities[$entity];
        $record = $modelClass::findOrFail($id);
        $record->delete();

        return redirect()->route('admin.dynamic.index', ['entity' => $entity])
            ->with('success', "Registro eliminado exitosamente.");
    }
}

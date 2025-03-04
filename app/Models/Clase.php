<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $table = 'clase';

    protected $fillable = [
        'nombre',
        'descripcion',
        'horario',
        'capacidad_max',
        'JAM',
    ];

    /**
     * Relación con Reserva (1:N).
     * Una clase puede tener muchas reservas.
     */
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'ID_Clase');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Clase extends Model
{
    protected $table = 'clase';

    protected $fillable = [
        'nombre',
        'descripcion',
        'horario',
        'capacidad_max',
        'instructor',
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

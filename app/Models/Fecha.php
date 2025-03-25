<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    protected $table = 'fecha';

    protected $fillable = [
        'dia',
        'mes',
        'anyo',
        'hora',
        'minutos',
        'ID_Empleado',
    ];

    /**
     * Relación con Empleado (N:1).
     * Muchas fechas podrían estar asociadas a un mismo empleado (opcional).
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'ID_Empleado');
    }

    /**
     * Relación con Reserva (1:N).
     * Una fecha puede tener muchas reservas asociadas.
     */
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'ID_Fecha');
    }
}

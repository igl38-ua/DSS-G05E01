<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

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

    public function getFechaFormateadaAttribute()
    {
        // Asegúrate de que los enteros tengan dos dígitos
        $dd = str_pad($this->dia, 2, '0', STR_PAD_LEFT);
        $mm = str_pad($this->mes, 2, '0', STR_PAD_LEFT);
        return "{$dd}/{$mm}/{$this->anyo}";
    }

    /**
     * Devuelve la hora de inicio formateada HH:MM
     */
    public function getHoraInicioFormateadaAttribute()
    {
        $hh = str_pad($this->hora, 2, '0', STR_PAD_LEFT);
        $ii = str_pad($this->minutos, 2, '0', STR_PAD_LEFT);
        return "{$hh}:{$ii}";
    }
}

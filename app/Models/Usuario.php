<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 


class Usuario extends Model
{
    protected $table = 'usuario';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'contrasena',
        'fecha_inscripcion',
    ];

    /**
     * Relación con Reserva (1:N).
     * Un usuario puede tener muchas reservas.
     */
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'ID_Usuario');
    }

    public function clases()
    {
        return $this->belongsToMany(Clase::class, 'reserva', 'ID_Usuario', 'ID_Clase')
                    ->withPivot('ID_Fecha');
    }
}

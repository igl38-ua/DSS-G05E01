<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

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
}

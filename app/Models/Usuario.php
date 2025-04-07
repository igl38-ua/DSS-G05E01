<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    protected $table = 'usuario';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'contrasena',
        'fecha_inscripcion',
        'rol',
    ];
    
    /**
     * El campo que se usará para la autenticación.
     */
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    /**
     * Relación con Reserva (1:N).
     * Un usuario puede tener muchas reservas.
     */
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'ID_Usuario');
    }

}

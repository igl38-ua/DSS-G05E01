<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Reserva extends Model
{
    protected $table = 'reserva';

    protected $fillable = [
        'ID_Usuario',
        'ID_Clase',
        'ID_Fecha',
    ];

    /**
     * Relación con Usuario (N:1).
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_Usuario');
    }

    /**
     * Relación con Clase (N:1).
     */
    public function clase()
    {
        return $this->belongsTo(Clase::class, 'ID_Clase');
    }

    /**
     * Relación con Fecha (N:1).
     */
    public function fecha()
    {
        return $this->belongsTo(Fecha::class, 'ID_Fecha');
    }
}

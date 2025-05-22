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
        'fecha',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    /**
     * Relación con Usuario (N:1).
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_Usuario');
    }

    // Relación con clase
    public function clase()
    {
        return $this->belongsTo(Clase::class, 'ID_Clase');
    }

    public function getFechaFormateadaAttribute()
    {
        return $this->fecha ? $this->fecha->format('d/m/Y') : 'No definida';
    }

    public function getHoraInicioFormateadaAttribute()
    {
        return $this->fecha ? $this->fecha->format('H:i') : '--:--';
    }
}
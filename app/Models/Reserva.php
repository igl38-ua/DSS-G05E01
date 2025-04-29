<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reserva'; // Recomendado usar nombre en plural

    protected $fillable = [
        'user_id',       // Cambiar a snake_case
        'clase_id',      // Cambiar a snake_case
        'fecha_reserva', // Cambiar a nombre más descriptivo
    ];

    /**
     * Relación con Usuario (N:1).
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Asumiendo que usas el modelo User de Laravel
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function clase()
    {
        return $this->belongsTo(Clase::class);
    }
}
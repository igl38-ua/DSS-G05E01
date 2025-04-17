<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Suscripcion extends Model
{
    use HasFactory;

    protected $table = 'suscripcion';

    protected $fillable = [
        'ID_Usuario',
        'plan',
        'precio',
        'fecha_inicio',
        'fecha_expiracion',
    ];

    protected $casts = [
        'fecha_inicio'  => 'date',
        'fecha_expiracion'  => 'date',
        'price'       => 'float',
    ];

    /**
     * Relación inversa con Usuario
     */
    public function user()
    {
        return $this->belongsTo(Usuario::class, 'ID_Usuario');
    }
}
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use App\Models\Suscripcion;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuario';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'password',
        'fecha_inscripcion',
        'rol',
        'monthly_goal',
        'google_id',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Retorna el campo de contraseña para autenticación.
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Relación 1:N con Reserva.
     */
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'ID_Usuario');
    }

    /**
     * Reservas de este mes (para calcular progreso).
     */
    public function reservasThisMonth()
    {
        return $this->reservas()
            ->whereHas('fecha', function($q){
                $q->where('mes',  Carbon::now()->month)
                ->where('anyo', Carbon::now()->year);
            });
    }


    /**
     * Últimas 4 suscripciones del usuario.
     */
    public function suscripciones()
    {
        return $this->hasMany(Suscripcion::class, 'ID_Usuario')
                    ->orderBy('fecha_inicio', 'desc')
                    ->take(4);
    }

    /**
     * Suscripción activa (la más reciente).
     */
    public function suscripcionActual()
    {
        return $this->hasOne(Suscripcion::class, 'ID_Usuario')
                    ->latestOfMany('fecha_inicio');
    }

    /**
     * Próximas reservas (clases) a partir de hoy.
     */
    public function upcomingClasses(int $limit = 6)
    {
        return $this->reservas()
                    ->with(['clase','fecha'])
                    ->whereDate('fecha', '>=', Carbon::today())
                    ->orderBy('fecha','asc')
                    ->take($limit)
                    ->get();
    }
    

}

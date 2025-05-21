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
        'payment_method',
        'suscripcion_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
    * Casteos de atributos.
    */
    protected $casts = [
        'fecha_inscripcion' => 'date',
        'payment_method'    => 'string',
        'suscripcion_id'    => 'integer',
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
            ->whereMonth('fecha', Carbon::now()->month)
            ->whereYear('fecha',  Carbon::now()->year);
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

    // En App\Models\Usuario.php
    public function upcomingClassesQuery()
    {
        return $this->reservas()
                    ->with(['clase','fecha'])
                    ->whereDate('fecha','>=',now())
                    ->orderBy('fecha','asc');
    }

    /**
     * Pedidos realizados por el usuario.
     */
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'ID_Usuario');
    }

    public function clases()
    {
        return $this->belongsToMany(
            Clase::class,
            'reserva', // Nombre real de la tabla pivote (singular)
            'ID_Usuario', // FK del usuario en reserva
            'ID_Clase'   // FK de la clase en reserva
        )->withTimestamps();
    }

    public function objetivoMes()
    {
        return $this->hasOne(ObjetivoMes::class, 'user_id');
    }


}

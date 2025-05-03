<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Empleado extends Model
{
    use HasFactory;

    // protected $primaryKey = 'ID';
    protected $table = 'empleado';
    protected $fillable = [
        'nombre',
        'email',
        'direccion',
        'horarioTrabajo',
        'nomina',
    ];

    public function fechas()
    {
        return $this->hasMany(Fecha::class, 'ID_Empleado');
    }

    public function clases()
    {
        return $this->hasMany(Clase::class, 'instructor');
    }

    public function monitor()
    {
        return $this->belongsTo(Empleado::class, 'monitor_id');
    }

    public function entrenadorPersonal()
    {
        return $this->hasOne(EntrenadorPersonal::class, 'id', 'id');
    }

    public function clasesComoMonitor()
    {
        return $this->hasMany(Clase::class, 'monitor_id');
    }
}

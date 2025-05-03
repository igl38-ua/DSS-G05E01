<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use SoftDeletes;

class Clase extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = 'clase';

    protected $fillable = [
        'nombre',
        'descripcion',
        'horario',
        'capacidad_max',
        'instructor',
    ];

    public function instructorInfo()
    {
        return $this->belongsTo(Empleado::class, 'instructor', 'id');
    }

    public function monitor()
    {
        return $this->belongsTo(Empleado::class, 'instructor', 'nombre');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'ID_Clase');
    }
}

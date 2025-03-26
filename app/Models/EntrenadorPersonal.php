<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class EntrenadorPersonal extends Model
{
    protected $table = 'entrenador_personal';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'suplemento_nomina',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntrenadorPersonal extends Model
{
    use HasFactory;

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

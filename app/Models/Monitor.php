<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $table = 'monitor';

    // la clave primaria es la misma que la de empleado y no es autoincremental
    public $incrementing = false;

    protected $fillable = [
        'id',
        'especialidad',
    ];

    /**
     * Relación con Empleado.
     * El foreign key es 'id' en monitor que apunta a 'id' en empleado.
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id');
    }
}

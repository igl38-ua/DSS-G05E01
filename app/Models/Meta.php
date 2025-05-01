<?php
// app/Models/Meta.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Meta extends Model
{
    use HasFactory;

    protected $table = 'metas';

    protected $fillable = [
        'ID_Usuario',
        'anyo',
        'mes',
        'objetivo',
        'descripcion',
    ];

    protected $casts = [
        'anyo'       => 'integer',
        'mes'        => 'integer',
        'objetivo'   => 'integer',
    ];

    /**
     * Relación inversa con Usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_Usuario');
    }

    /**
     * Helper: devuelve el primer día del mes como instancia Carbon.
     */
    public function getPeriodoAttribute()
    {
        return Carbon::create($this->anyo, $this->mes, 1);
    }
}

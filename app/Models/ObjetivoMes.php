<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjetivoMes extends Model
{
    // Si tu tabla se llama objetivo_mes, explícala (opcional si respetas la convención)
    protected $table = 'objetivo_mes';

    // Para asignación masiva
    protected $fillable = ['user_id', 'target'];

    /**
     * Relación inversa con Usuario
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

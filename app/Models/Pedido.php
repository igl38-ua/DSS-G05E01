<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'ID_Usuario',
        'suscripcion_id',
        'plan',
        'amount',
        'status',
        'payment_method',
        'gateway_response',
    ];

    protected $casts = [
        'amount'            => 'float',
        'gateway_response'  => 'array',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_Usuario');
    }

    public function suscripcion()
    {
        return $this->belongsTo(Suscripcion::class, 'suscripcion_id');
    }
}

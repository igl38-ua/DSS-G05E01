<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // o donde est� tu modelo de usuario

class Thread extends Model
{
    // Añade todas las columnas que vayas a rellenar por create():
    protected $fillable = [
        'category_id',
        'title',
        'body',
        'likes',
        'dislikes',
    ];

    protected $casts = [
        'likes'    => 'integer',
        'dislikes' => 'integer',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class)->latest();
    }


    // Relaci�n al autor, cambiando la FK a "usuario"
    public function author()
    {
        return $this->belongsTo(Usuario::class, 'usuario');
    }
}

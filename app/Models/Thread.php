<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuaro;

class Thread extends Model
{
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

    // Autor del hilo
    public function author()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    // Todos los “likes” (type = 'like')
    public function likes()
    {
        return $this->hasMany(Like::class, 'thread_id')
                    ->where('type', 'like');
    }

    /** Dislikes de este hilo (solo registros con type = 'dislike') */
    public function dislikes()
    {
        return $this->hasMany(Like::class, 'thread_id')
                    ->where('type', 'dislike');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['thread_id','usuario','body'];

    public function thread() { return $this->belongsTo(Thread::class); }
    public function author() { return $this->belongsTo(Usuario::class,'usuario'); }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id')->latest();
    }
}


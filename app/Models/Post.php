<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['thread_id','user_id','body'];
    
    public function thread() { return $this->belongsTo(Thread::class); }
    public function author() { return $this->belongsTo(Usuario::class,'user_id'); }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id')->latest();
    }
        public function likes()
    {
        return $this->hasMany(Like::class, 'thread_id', 'id');
    }
}


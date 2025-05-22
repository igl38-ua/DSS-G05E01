<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id','user_id','body'];
    
    public function post() { return $this->belongsTo(Post::class); }
    public function author() { return $this->belongsTo(Usuario::class,'user_id'); }
    public function likes()
    {
        return $this->hasMany(Like::class, 'comment_id', 'id');
    }

}
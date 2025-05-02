<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;  
// app/Models/Category.php
class Category extends Model
{
    protected $fillable = ['name','slug','description','icon'];
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}

// app/Models/Thread.php
class Thread extends Model
{
    protected $fillable = ['category_id','title','body','views','usuario'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(Usuario::class, 'usuario');
    }
    public function threads()
    {
        // <? Asegúrate de que apunta a App\Models\Thread
        return $this->hasMany(Thread::class, 'category_id');
    }
}

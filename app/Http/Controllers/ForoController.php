<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use Illuminate\Http\Request;

class ForoController extends Controller
{
    public function index()
    {

        $categories = Category::all();
    

        $trending = Thread::with('author')
                    ->orderByDesc('likes')
                    ->take(5)
                    ->get();
    
        return view('foro.index', compact('categories', 'trending'));
    }
}

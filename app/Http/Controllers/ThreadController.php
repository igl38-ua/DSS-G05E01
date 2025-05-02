<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Like;


class ThreadController extends Controller
{
    public function byCategory(Category $category)
    {
        // lista paginada “normal”
        $threads = Thread::where('category_id', $category->id)
            ->select('threads.*')
            ->selectSub(
                Like::selectRaw('COUNT(*)')
                    ->whereColumn('thread_id', 'threads.id')
                    ->where('type', 'like'),
                'likes_count'
            )
            ->selectSub(
                Like::selectRaw('COUNT(*)')
                    ->whereColumn('thread_id', 'threads.id')
                    ->where('type', 'dislike'),
                'dislikes_count'
            )
            ->latest()
            ->paginate(15);
    
        // Top‑5 dentro de la categoría
        $topThreads = Thread::where('category_id', $category->id)
            ->orderByDesc('likes')
            ->take(5)
            ->get();

        // Lista paginada completa
        $allThreads = Thread::where('category_id', $category->id)
            ->latest()          // o ->orderByDesc('created_at')
            ->paginate(15);

        
        return view('foro.category', [
            'category'    => $category,
            'topThreads'  => $topThreads,
            'allThreads'  => $allThreads,
        ]);
    }

    // formulario para nuevo hilo
    public function create(Category $category)
    {
        return view('foro.threads.create', compact('category'));
    }

    public function store(Request $request, Category $category)
    {
        // Si no hay usuario logueado, lo mandamos a iniciar sesi�n
        if (! auth()->check()) {
            return redirect()
                ->route('login')
                ->with('error','Debes iniciar sesión para crear un hilo.');
        }
    
        $request->validate([
          'title' => 'required|string|max:255',
          'body'  => 'required|string|min:1',
        ]);
    
        $thread = $category->threads()->create([
          'usuario' => auth()->id(),
          'title'   => $request->title,
          'body'    => $request->body,
        ]);
    
        return redirect()->route('foro.threads.show', $thread)
                         ->with('success','Hilo creado correctamente.');
    }
    
    public function show(Thread $thread)
    {
        // Carga los posts, sus autores, y para CADA post sus comentarios y autores de comentarios
        $thread->load([
           'posts.author',
           'posts.comments.author',
        ]);
    
        return view('foro.show', compact('thread'));
    }

    public function like(Thread $thread)
    {
        $thread->increment('likes');
        // si llevas registro por usuario, crea/actualiza aquí la fila en la tabla likes
        return back();
    }

    public function dislike(Thread $thread)
    {
        $thread->increment('dislikes');
        return back();
    }
}

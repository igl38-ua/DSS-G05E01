<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class ThreadController extends Controller
{
   public function byCategory(Category $category)
    {
        $allThreads = Thread::where('category_id', $category->id)
            ->with('author')  // para no hacer N+1 al pedir el nombre
            //->withCount(['likes','dislikes'])
            ->orderByDesc('likes_count')
            ->paginate(5);

        $topThreads = Thread::where('category_id', $category->id)
            ->with('author')
            //->withCount(['liked','dislikes'])
            ->orderByDesc('likes_count')
            ->take(5)
            ->get();

        return view('foro.category', [
            'category'   => $category,
            'topThreads' => $topThreads,
            'allThreads' => $allThreads,
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

    $posts = $thread
        ->posts()
        ->with(['author', 'comments.author'])
        ->orderBy('likes', 'desc')
        ->orderBy('created_at', 'desc')
        ->Paginate(5);

    // 2) devolvemos ambas variables
    return view('foro.show', compact('thread', 'posts'));
}

public function like(Thread $thread)
{
        $userId = Auth::id();

        // 1) Si ya había like → lo borramos (toggle off)
        if ($thread->likes()->where('user_id', $userId)->exists()) {
            $thread->likes()->where('user_id', $userId)->delete();
            return back();
        }

        // 2) Borramos por si hubiera duplicados
        $thread->likes()->where('user_id', $userId)->delete();

        // 3) Creamos el like, incluyendo thread_id
        $thread->likes()->create([
            'user_id'    => $userId,
            'comment_id' => $thread->id,
        ]);

        return back();
}

public function dislike(Thread $thread)
{
    $userId = auth()->id();

    $vote = $thread->likes()
                   ->where('user_id', $userId)
                   ->first();

    if ($vote) {
        if ($vote->type === 'dislike') {
            // Si ya era DISLIKE, lo borramos (toggle off)
            $vote->delete();
        } else {
            // Si era LIKE, lo convertimos a DISLIKE
            $vote->update(['type' => 'dislike']);
        }
    } else {
        // Si no existía ningún voto, creamos un DISLIKE
        $thread->likes()->create([
            'user_id'   => $userId,
            'thread_id' => $thread->id,
            'type'      => 'dislike',
        ]);
    }

    return back();
}

}

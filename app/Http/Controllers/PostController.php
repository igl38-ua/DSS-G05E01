<?php
namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $req, Thread $thread)
    {
        $req->validate(['body'=>'required|min:1']);
        $thread->posts()->create([
          'user_id'=>auth()->id(),
          'body'=>$req->body,
        ]);
        return back();
    }

    public function update(Request $req, Post $post)
    {
        $this->authorize('update',$post);
        $req->validate(['body'=>'required|min:1']);
        $post->update(['body'=>$req->body]);
        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return back();
    }

public function like(Post $post)
{
    $userId = Auth::id();

    // 1) Si ya había Like → lo borramos (toggle off)
    if ($post->likes()->where('user_id', $userId)->exists()) {
        $post->likes()->where('user_id', $userId)->delete();
        return back();
    }

    // 2) (Opcional) eliminar duplicados por si acaso
    $post->likes()->where('user_id', $userId)->delete();

    // 3) Creamos el nuevo like, incluyendo el post_id
    $post->likes()->create([
        'user_id' => $userId,
        'post_id' => $post->id,
    ]);

    return back();
}



    public function dislike(Post $post)
    {
        $userId = Auth::id();

        // Dislike
        $post->likes()->where('user_id', $userId)->delete();

        return back();
    }
}
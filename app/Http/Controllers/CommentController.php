<?php
// app/Http/Controllers/CommentController.php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $req, Post $post)
    {
        $req->validate(['body'=>'required|min:3']);
        $post->comments()->create([
          'user_id'=>auth()->id(),
          'body'=>$req->body,
        ]);
        return redirect()
            ->route('foro.threads.show', $post->thread)
            ->with('success','Comentario añadido.');
    }

    public function update(Request $req, Comment $comment)
    {
        $this->authorize('update',$comment);
        $req->validate(['body'=>'required|min:3']);
        $comment->update(['body'=>$req->body]);
        return back();
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete',$comment);
        $comment->delete();
        return back();
    }

    public function like(Comment $comment)
    {
        $userId = Auth::id();

        // 1) Si ya había like → lo borramos (toggle off)
        if ($comment->likes()->where('user_id', $userId)->exists()) {
            $comment->likes()->where('user_id', $userId)->delete();
            return back();
        }

        // 2) Borramos por si hubiera duplicados
        $comment->likes()->where('user_id', $userId)->delete();

        // 3) Creamos el like, incluyendo thread_id
        $comment->likes()->create([
            'user_id'    => $userId,
            'comment_id' => $comment->id,
            //'thread_id'  => $comment->post->thread_id,
        ]);

        return back();
    }




    public function dislike(Comment $comment)
    {
        // Un “dislike” = quitar el like
        $comment->likes()
                ->where('user_id', Auth::id())
                ->delete();
                // 1) Si ya había like, salimos

        return back();
    }
}

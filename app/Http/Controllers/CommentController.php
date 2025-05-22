<?php

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

        // Si ya había like lo borramos 
        if ($comment->likes()->where('user_id', $userId)->exists()) {
            $comment->likes()->where('user_id', $userId)->delete();
            return back();
        }

        // Borramos por si hubiera duplicados
        $comment->likes()->where('user_id', $userId)->delete();

        // Creamos el like, incluyendo thread_id
        $comment->likes()->create([
            'user_id'    => $userId,
            'comment_id' => $comment->id,
            //'thread_id'  => $comment->post->thread_id,
        ]);

        return back();
    }




    public function dislike(Comment $comment)
    {
        $comment->likes()
                ->where('user_id', Auth::id())
                ->delete();

        return back();
    }
}

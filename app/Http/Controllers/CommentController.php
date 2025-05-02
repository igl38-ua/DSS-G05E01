<?php
// app/Http/Controllers/CommentController.php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

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
        $comment->increment('likes');
        return back();
    }
    public function dislike(Comment $comment)
    {
        $comment->increment('dislikes');
        return back();
    }
}

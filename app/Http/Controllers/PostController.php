<?php
namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $req, Thread $thread)
    {
        $req->validate(['body'=>'required|min:3']);
        $thread->posts()->create([
          'user_id'=>auth()->id(),
          'body'=>$req->body,
        ]);
        return back();
    }

    public function update(Request $req, Post $post)
    {
        $this->authorize('update',$post);
        $req->validate(['body'=>'required|min:3']);
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
        $post->increment('likes');
        return back();
    }
    public function dislike(Post $post)
    {
        $post->increment('dislikes');
        return back();
    }
}
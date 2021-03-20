<?php

namespace App\Http\Controllers;

use App\Comment;
use \App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $data=request()->validate([
            "text" => "required"
        ]);

        $profile_id = auth()->user()->id;
        $post->comments()->create([
            "post_id" => $post->id,
            "text" => $data['text'],
            "profile_id" => $profile_id
        ]);

        return redirect('p/' . $post->id);
    }

    public function delete(Post $post, Comment $comment)
    {
        $post->comments()->find($comment->id)->delete();

        return redirect('p/' . $post->id);
    }
}

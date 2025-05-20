<?php

namespace App\Services;

use App\Models\Comments\Comment;
use App\Models\Posts\Post;
use Illuminate\Http\Request;

class CommentService
{
    public function store(Request $request, Post $post)
    {
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->post_id = $post->id;
        $comment->user_id = auth()->id(); 
        $comment->save();

        return $comment;
    }
}

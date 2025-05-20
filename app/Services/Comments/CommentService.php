<?php

namespace App\Services;

use App\Models\Comments\Comment;
use App\Models\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentService
{
    /**
     * 
     *
     * @param Request $request
     * @param Post $post
     * @return Comment
     * @throws ModelNotFoundException
     */
    public function store(Request $request, Post $post)
    {
        if (!$post) {
            throw new ModelNotFoundException('Пост не найден.');
        }

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->post_id = $post->id;
        $comment->user_id = auth()->id();
        $comment->save();

        return $comment;
    }
}

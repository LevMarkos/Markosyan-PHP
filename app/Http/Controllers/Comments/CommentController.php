<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Posts\Post;
use App\Services\CommentService;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(CommentRequest $request, Post $post)
    {
        $comment = $this->commentService->store($request, $post);
        return new CommentResource($comment->load('user'));
    }
}

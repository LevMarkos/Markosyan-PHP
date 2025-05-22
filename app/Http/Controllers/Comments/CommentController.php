<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Posts\Post;
use App\Services\CommentService;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;

        $this->middleware('auth');
    }

    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

    public function store(CommentRequest $request, Post $post)
    {
        $comment = $this->commentService->store($request, $post);
        return redirect()->route('posts.index')->with('success', 'Комментарий успешно добавлен!');
    }
}

<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\CommentRequest;
use App\Models\Posts\Post;
use App\Jobs\CreateCommentJob;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

    public function store(CommentRequest $request, Post $post)
    {
        // Валидация данных уже происходит в CommentRequest, поэтому можно сразу использовать $request->validated()
        $validatedData = $request->validated();

        // Диспетчеризация Job для создания комментария
        CreateCommentJob::dispatch($post->id, $validatedData);

        return redirect()->route('posts.comments.index', $post->id)->with('success', 'Комментарий успешно добавлен!');
    }
}

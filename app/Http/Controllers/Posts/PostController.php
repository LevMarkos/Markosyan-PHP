<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\PostRequest;
use App\Models\Posts\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        // Создаем пост с заполнением user_id
        $post = Post::create(array_merge($request->validated(), ['user_id' => Auth::id()]));

        if ($request->hasFile('image')) {
            $post->addMedia($request->file('image'))->toMediaCollection('images');
        }

        return redirect()->route('posts.index')->with('success', 'Пост успешно создан!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());

        if ($request->hasFile('image')) {
            $post->addMedia($request->file('image'))->toMediaCollection('images');
        }

        return redirect()->route('posts.index')->with('success', 'Пост успешно обновлён!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Пост успешно удалён!');
    }

    public function head()
    {
        $posts = Post::all();
        return view('head', compact('posts'));
    }
}

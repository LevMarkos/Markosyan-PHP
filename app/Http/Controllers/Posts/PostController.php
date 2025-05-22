<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\PostRequest;
use App\Http\Resources\PostResource;
use App\Mail\PostCreatedMail;
use App\Models\Posts\Post;
use App\Models\Users\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function postCreated(Post $post)
    {
        return view('posts.post_created', compact('post'));
    }

    public function index()
    {
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts')); 
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post): PostResource
    {
        $post->load(['user', 'comments.user']);
        return new PostResource($post);
    }

    public function store(PostRequest $request): PostResource
    {
        $post = Post::create(array_merge($request->validated(), ['user_id' => Auth::id()]));

        $this->handleImageUpload($request, $post);

        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new PostCreatedMail($post));
        }

        return new PostResource($post);
    }

    public function update(PostRequest $request, Post $post): PostResource
    {
        $post->update($request->validated());
        $this->handleImageUpload($request, $post);

        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Пост успешно удалён!'], 200);
    }

    private function handleImageUpload(PostRequest $request, Post $post): void
    {
        if ($request->hasFile('image')) {
            $post->addMedia($request->file('image'))->toMediaCollection('images');
        }
    }
}

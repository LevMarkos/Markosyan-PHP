<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Posts\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function index()
{
    $posts = Post::with('user')->get();
    $data = PostResource::collection($posts);
    return response()->json($data);
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

<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    protected $postService;

    public function __construct(\App\Services\Posts\PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return PostResource::collection($posts);
    }

    public function store(StorePostRequest $request)
    {
        $post = $this->postService->createPost($request->validated());

        if ($request->hasFile('image')) {
            $post->addMedia($request->file('image'))->toMediaCollection('images');
        }

        return new PostResource($post);
    }

    public function show($id)
    {
        $post = $this->postService->getPostById($id);
        return new PostResource($post);
    }

    public function update(UpdatePostRequest $request, $id) 
    {
        $post = $this->postService->updatePost($id, $request->validated());
        return new PostResource($post);
    }

    public function destroy($id)
    {
        $this->postService->deletePost($id);
        return response()->json(null, 204);
    }
}

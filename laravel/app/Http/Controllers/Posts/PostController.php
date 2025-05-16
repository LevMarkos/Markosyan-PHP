<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Services\Posts\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return PostResource::collection($this->postService->getAllPosts());
    }

    public function store(StorePostRequest $request)
    {
        $postResource = $this->postService->createPost($request->validated());

        if ($request->hasFile('image')) {
    $postResource->addMedia($request->file('image'))->toMediaCollection('images');
    $postResource->save();
}
    }

    public function show($id)
    {
        return $this->postService->getPostById($id);
    }

    public function update(UpdatePostRequest $request, $id) 
    {
        return $this->postService->updatePost($id, $request->validated());
    }

    public function destroy($id)
    {
        $this->postService->deletePost($id);
        return response()->json(null, 204);
    }
}

<?php
namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    protected $postService;

    public function __construct(\App\Post\Services\PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $this->postService->createPost($request->validated());
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = $this->postService->getPostById($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = $this->postService->getPostById($id);
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, $id) 
    {
        $this->postService->updatePost($id, $request->validated());
        return redirect()->route('posts.index');
    }
}

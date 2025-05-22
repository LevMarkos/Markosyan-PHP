<?php
namespace App\Services;

use App\Models\Posts\Post;
use App\Http\Requests\Posts\PostRequest;

class PostService
{
    public function index()
    {
        return Post::all();
    }

    public function create(array $validatedData, $image = null)
    {
        $post = Post::create($validatedData);

        if ($image) {
            $post->addMedia($image)->toMediaCollection('images');
        }

        return $post;
    }

    public function update(array $validatedData, Post $post, $image = null)
    {
        $post->update($validatedData);

        if ($image) {
            $post->addMedia($image)->toMediaCollection('images');
        }

        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();
    }

    public function head()
    {
        return Post::all();
    }
}


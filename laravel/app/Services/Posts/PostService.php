<?php

namespace App\Post\Services;

use App\Models\Post;

class PostService
{
    public function getAllPosts()
    {
        return Post::all();
    }

    public function createPost($data)
    {
        return Post::create($data);
    }

    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }
}

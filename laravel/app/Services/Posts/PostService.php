<?php

namespace App\Services\Posts;

use App\Models\Post;
use App\Http\Resources\PostResource;
use Log;

class PostService 
{
    public function getAllPosts() 
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function createPost($data) 
    {
        Log::channel('sevenchanges')->info('Создан новый пост: ' . json_encode($data));
        $post = Post::create($data);
        return new PostResource($post);
    }

    public function getPostById($id) 
    {
        Log::channel('sevenchanges')->info('Поиск поста по ID: ' . $id);
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }

    public function updatePost($id, $data) 
    {
        $post = $this->getPostById($id);
        $post->update($data);
        Log::channel('sevenchanges')->info('Пост изменён: ' . json_encode($post));
        return new PostResource($post);
    }

    public function deletePost($id)
    {
        $post = $this->getPostById($id);
        Log::channel('sevenchanges')->info('Удаление поста: ' . json_encode($post));
        $post->delete();
    }
}

<?php 

namespace App\Post\Services; 

use App\Models\Post; 
use Log; 

class PostService { 
    public function getAllPosts() { 
        return Post::all(); 
    } 

    public function createPost($data) { 
        Log::channel('sevenchanges')->info('Создан новый пост: ' . json_encode($data));
        return Post::create($data); 
    } 

    public function getPostById($id) { 
        Log::channel('sevenchanges')->info('Поиск поста по ID: ' . $id);
        return Post::findOrFail($id); 
    } 

    public function updatePost($id, $data) { 
        $post = $this->getPostById($id); 
        $post->update($data); 
        Log::channel('sevenchanges')->info('Пост изменён: ' . json_encode($post));
        return $post; 
    } 
}

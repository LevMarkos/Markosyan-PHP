<?php

namespace App\Models\Comments;

use App\Models\Posts\Post;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Database\Factories\CommentFactory::new();
    }

    // Указываем, какие поля могут быть массово присвоены
    protected $fillable = ['content', 'post_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

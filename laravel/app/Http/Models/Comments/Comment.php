<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'content'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::created(function ($comment) {
            Log::channel('sevenchanges')->info('Комментарий создан: ', $comment->toArray());
        });

        static::updated(function ($comment) {
            Log::channel('sevenchanges')->info('Комментарий обновлен: ', $comment->toArray());
        });

        static::deleted(function ($comment) {
            Log::channel('model_changes')->info('Комментарий удален: ', $comment->toArray());
        });
    }
}

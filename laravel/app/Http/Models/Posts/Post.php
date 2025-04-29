<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Post extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::created(function ($post) {
            Log::channel('sevenchanges')->info('Пост создан: ', $post->toArray());
        });

        static::updated(function ($post) {
            Log::channel('sevenchanges')->info('Пост обновлен: ', $post->toArray());
        });

        static::deleted(function ($post) {
            Log::channel('sevenchanges')->info('Пост удален: ', $post->toArray());
        });
    }
}

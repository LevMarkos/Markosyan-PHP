<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            Log::channel('sevenchangeschanges')->info('Пользователь создан: ', $user->toArray());
        });

        static::updated(function ($user) {
            Log::channel('sevenchangeschanges')->info('Пользователь обновлен: ', $user->toArray());
        });

        static::deleted(function ($user) {
            Log::channel('sevenchangeschanges')->info('Пользователь удален: ', $user->toArray());
        });
    }
}

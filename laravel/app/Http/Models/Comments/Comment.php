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
}

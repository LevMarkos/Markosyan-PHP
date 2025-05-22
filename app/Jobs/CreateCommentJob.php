<?php

namespace App\Jobs;

use App\Models\Comments\Comment;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateCommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $postId;
    protected $data;

    public function __construct($postId, array $data)
    {
        $this->postId = $postId;
        $this->data = $data;
    }

    public function handle()
    {
        $comment = new Comment($this->data);
        $comment->post_id = $this->postId;
        $comment->save();
    }
}

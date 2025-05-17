<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CommentStoreJob implements ShouldQueue
{
    use Dispatchable, Queueable, InteractsWithQueue, SerializesModels;

    protected $data; // Определяем свойство $data

    /**
     * Create a new job instance.
     *
     * @param array $data Данные для создания комментария
     */
    public function __construct(array $data)
    {
        $this->data = $data; // Инициализируем свойство $data
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Comment::create($this->data); // Создаем комментарий с использованием $this->data
    }
}

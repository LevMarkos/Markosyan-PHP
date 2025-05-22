<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;

    /**
     * Создайте новый экземпляр сообщения.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Построить сообщение.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Новый пост создан')
                    ->view('emails.post_created'); // Укажите путь к вашему шаблону
    }
}

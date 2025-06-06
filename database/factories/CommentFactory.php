<?php

namespace Database\Factories;

use App\Models\Comments\Comment; 
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'content' => $this->faker->sentence,
        ];
    }
}


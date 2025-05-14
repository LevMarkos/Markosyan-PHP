<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class UserPostSeeder extends Seeder
{
    /**
     * Seed the users and their posts with comments.
     */
    public function run()
    {
        User::factory(10)->create()->each(function ($user) {
            $posts = Post::factory(3)->create(['user_id' => $user->id]);

            foreach ($posts as $post) {
                Comment::factory(5)->create(['post_id' => $post->id, 'user_id' => $user->id]);
            }
        });
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comments\Comment;
use App\Models\Posts\Post;
use App\Models\Users\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $users = User::all();

        foreach ($posts as $post) {
            foreach ($users as $user) {
                Comment::factory()->count(2)->create([
                    'post_id' => $post->id,
                    'user_id' => $user->id
                ]);
            }
        }
    }
}

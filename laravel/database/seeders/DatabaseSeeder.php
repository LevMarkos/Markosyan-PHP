<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    $this->call(RolesAndPermissionsSeeder::class);
    User::factory(10)->create()->each(function ($user) {
        $posts = \App\Models\Post::factory(3)->create(['user_id' => $user->id]);

        foreach ($posts as $post) {
            \App\Models\Comment::factory(5)->create(['post_id' => $post->id, 'user_id' => $user->id]);
        }
    });
}
}

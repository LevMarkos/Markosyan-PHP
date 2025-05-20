<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posts\Post;
use App\Models\Users\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            Post::factory()->count(1)->create(['user_id' => $user->id]); 
        }
    }
}


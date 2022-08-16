<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);

        Post::create([
            'title' => 'PHP Post 1',
            'description' => 'PHP Post Desc',
            'is_publish' => 1,  // we use true
            'is_active' => 0,   // false
            'user_id' => $user->id
        ]);

        Post::create([
            'title' => 'PHP Post 2',
            'description' => 'PHP Post Desc',
            'is_publish' => 1,  // we use true
            'is_active' => 0,   // false
            'user_id' => $user->id
        ]);

        Post::create([
            'title' => 'PHP Post 3',
            'description' => 'PHP Post Desc',
            'is_publish' => 1,  // we use true
            'is_active' => 0,   // false
            'user_id' => $user->id
        ]);

    }
}

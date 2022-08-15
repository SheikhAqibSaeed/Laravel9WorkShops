<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Post::factory(10)->create();

        // Post::factory(10)->create([
        //     'title' => 'Laravel 9'
        // ]);

        // Post::factory()->count(10)->state(new Sequence(
        //     ['is_active' => '1'],
        //     ['is_active' => '0'],

        //     ['is_publish' => '1'],
        //     ['is_publish' => '0'],

        // ))->create();

        // Jitni bhi foreignKey ho ge phly usy disable kry phr empty or phr enable
        Schema::disableForeignKeyConstraints();
        Post::truncate();
        Schema::enableForeignKeyConstraints();

        Post::factory()->count(10)->state(new Sequence(
                ['is_active' => '1'],
                ['is_active' => '0'],

                ['is_publish' => '1'],
                ['is_publish' => '0'],

            ))->create();
    }
}

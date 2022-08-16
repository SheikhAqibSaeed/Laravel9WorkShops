<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
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

        // Post::factory()->count(10)->state(new Sequence(
        //         ['is_active' => '1'],
        //         ['is_active' => '0'],

        //         ['is_publish' => '1'],
        //         ['is_publish' => '0'],

        //     ))->create();

        // User::factory()
        // ->has(Post::factory()->count(5))     // One user with multiple data
        // ->create();

        // User::factory()
        // ->has(Post::factory()->count(5), 'posts')        // Same
        // ->create();

        // Also use this method
        // User::factory()->hasPosts(5)->create();

        //  Specific user find
        // $user = User::find(1);
        // if($user){
        //     Post::factory()
        //     ->count(5)
        //     ->for(User::factory())
        //     ->create();
        // }

        //   Reverse   Generate Fake data with Many to Many Relationship
        // Post::factory()
        // ->count(5)
        // ->for(User::factory())   // for we use the relations
        // ->create();

        //  Change the Column name

            // Post::factory()
            // ->count(5)
            // ->for(User::factory()->state(
            //     ['name' => 'Aqib Saeed']
            // ))
            // ->create();

            // User::factory()
            // ->has(Role::factory()->count(1))
            // ->create();

            //  Many to Many Polymorphic relationship
            // Post::factory()
            // ->hasAttached(
            // Tag::factory()->count(4),
            // ['tag_id' => 1]     // Add manual id
            // )
            // ->create();

            //      Also use
            // Post::factory()
            // ->hasTag(3,['tag_id' => 1])
            // ->create();

            //  for calling seeder by PostSeeder
            // $this->call(
            //     PostSeeder::class
            // );

            //  Multiple Insert data only one command
                // Run Seeders and Factories at Once in Laravel
            User::factory(1)->create();
            Post::factory(1)->create();
            Role::factory(1)->create();
            Tag::factory(1)->create();

            $this->call([
                PostSeeder::class,
                TagSeeder::class
            ]);
    }
}

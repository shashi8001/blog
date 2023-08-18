<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name'  => 'Shashi'
        ]);
        $user2 = User::factory()->create([
            'name'  =>  'Sree'
        ]);

        Post::factory(3)->create([
            'user_id'   =>  $user->id
        ]);
        Post::factory(3)->create([
            'user_id'   =>  $user2->id
        ]);

    }
}

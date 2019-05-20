<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory( \App\User::class , 50 )->create();
        factory( \App\Category::class , 15 )->create();
        factory( \App\Post::class , 500 )->create();
        factory( \App\Comment::class , 1500 )->create();
    }
}

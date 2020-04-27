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
        factory(\App\Category::class,10)->create();
        factory(\App\City::class,50)->create();
        factory(\App\User::class,50)->create();
        factory(\App\Post::class,50)->create();
        factory(\App\Image::class,10)->create();
        // $this->call(UserSeeder::class);
    }
}

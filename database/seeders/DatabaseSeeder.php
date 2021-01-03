<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            UserSeeder::class,
            FeedbackSeeder::class,
            GameListSeeder::class,
            ListGameSeeder::class,
            CommentSeeder::class
        ]);
    }
}

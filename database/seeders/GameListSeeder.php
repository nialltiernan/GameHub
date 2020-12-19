<?php

namespace Database\Seeders;

use App\Models\GameList;
use Illuminate\Database\Seeder;

class GameListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GameList::factory(8)->create(['user_id'=>1]);
        GameList::factory(2)->create(['user_id'=>2]);
        GameList::factory()->create();
    }
}

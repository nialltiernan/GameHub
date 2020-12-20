<?php

namespace Database\Seeders;

use App\Models\ListGame;
use Illuminate\Database\Seeder;

class ListGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListGame::factory(15)->create([
            'game_list_id' => 1
        ]);
        ListGame::factory(5)->create([
            'game_list_id' => 25
        ]);
    }
}

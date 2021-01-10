<?php

namespace Database\Seeders;

use App\Models\ListGame;
use Illuminate\Database\Seeder;

class ListGameSeeder extends Seeder
{
    private const GAME_IDS_WITH_BANNERS = [41494];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::GAME_IDS_WITH_BANNERS as $gameId) {
            ListGame::factory()->create([
                'game_list_id' => 1,
                'game_id' => $gameId
            ]);
        }

        ListGame::factory(15)->create([
            'game_list_id' => 2
        ]);
        ListGame::factory(5)->create([
            'game_list_id' => 25
        ]);
    }
}

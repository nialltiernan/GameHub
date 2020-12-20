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
        $lists = ['recently played', 'must haves', 'all time favourites', 'nostalgic feels'];
        foreach ($lists as $list) {
            GameList::factory()->create([
                'user_id'=>1,
                'name' => $list
            ]);
        }
        GameList::factory(20)->create(['user_id'=>1]);
        GameList::factory(2)->create(['user_id'=>2]);
        GameList::factory()->create();
    }
}

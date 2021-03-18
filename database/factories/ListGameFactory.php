<?php

namespace Database\Factories;

use App\Models\GameList;
use App\Models\ListGame;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListGameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ListGame::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'game_list_id' => self::factoryForModel(GameList::class),
            'game_id' => $this->faker->numberBetween(0, 25000)
        ];
    }
}

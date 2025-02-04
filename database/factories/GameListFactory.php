<?php

namespace Database\Factories;

use App\Models\GameList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameListFactory extends Factory
{

    protected $model = GameList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'user_id' => self::factoryForModel(User::class),
        ];
    }
}

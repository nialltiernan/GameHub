<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'game_id' => $this->faker->numberBetween(0, 25000),
            'message' => $this->faker->words(15, true),
            'user_id' => self::factoryForModel(User::class),
        ];
    }
}

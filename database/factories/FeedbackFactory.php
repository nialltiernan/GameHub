<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{

    protected string $model = Feedback::class;

    public function definition(): array
    {
        return [
            'comment' => $this->faker->paragraph,
            'email' => $this->faker->email
        ];
    }
}

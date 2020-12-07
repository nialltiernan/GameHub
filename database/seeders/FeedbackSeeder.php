<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feedback::factory(2)->create();
        Feedback::factory(2)->create(['email' => null]);
        Feedback::factory(2)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Affiliate;
use Illuminate\Database\Seeder;

class AffiliateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Affiliate::factory()->create(['name' => 'Audeze']);
        Affiliate::factory()->create(['name' => 'Eneba.com']);
        Affiliate::factory()->create(['name' => 'GameFly - Online Video Game Rentals']);
        Affiliate::factory()->create(['name' => 'GamersGate.com']);
        Affiliate::factory()->create(['name' => 'Green Man Gaming']);
        Affiliate::factory()->create(['name' => 'Kinguin']);
        Affiliate::factory()->create(['name' => 'Second Life']);
        Affiliate::factory()->create(['name' => 'Voidu B.V.']);
    }
}

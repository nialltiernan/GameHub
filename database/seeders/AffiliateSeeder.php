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
        Affiliate::factory()->create(['name' => 'Audeze', 'company_id' => 5432806]);
        Affiliate::factory()->create(['name' => 'Eneba.com', 'company_id' => 5273584]);
        Affiliate::factory()->create(['name' => 'GameFly - Online Video Game Rentals', 'company_id' => 1132500]);
        Affiliate::factory()->create(['name' => 'GamersGate.com', 'company_id' => 2821123]);
        Affiliate::factory()->create(['name' => 'Green Man Gaming', 'company_id' => 3386711]);
        Affiliate::factory()->create(['name' => 'Kinguin', 'company_id' => 4518745]);
        Affiliate::factory()->create(['name' => 'Second Life', 'company_id' => 4012682]);
        Affiliate::factory()->create(['name' => 'Voidu B.V.', 'company_id' => 5018082]);
    }
}

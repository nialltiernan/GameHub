<?php

namespace Database\Seeders;

use App\Models\AffiliateLink;
use Illuminate\Database\Seeder;

class AffiliateLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AffiliateLink::factory(5)->create(['affiliate_id' => 1]);
        AffiliateLink::factory(5)->create(['affiliate_id' => 2]);
        AffiliateLink::factory(5)->create(['affiliate_id' => 3]);
        AffiliateLink::factory(5)->create(['affiliate_id' => 4]);
    }
}

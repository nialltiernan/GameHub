<?php

namespace Database\Factories;

use App\Enums\AffiliateLinkTypes;
use App\Models\Affiliate;
use App\Models\AffiliateLink;
use Illuminate\Database\Eloquent\Factories\Factory;

class AffiliateLinkFactory extends Factory
{
    private const IMAGE_DIMENSIONS = [50, 100, 200, 400, 800];
    private const KEYWORDS = [
        null,
        ['PlayStation 5', 'Xbox One', 'computer games', 'console'],
        ['headphones', 'music', 'audio', 'gaming', 'headset'],
        ['PC games', 'computer games', 'action', 'strategy', 'simulator'],
        ['Call of Duty', 'action', 'multiplayer'],
        ['Cyberpunk 2077', 'rpg', 'single player'],
        ['Assassin\'s Creed Valhalla', 'action', 'role playing game', 'stealth'],
    ];

    protected string $model = AffiliateLink::class;

    public function definition(): array
    {
        return [
            'link_id' => $this->faker->numberBetween(),
            'affiliate_id' => self::factoryForModel(Affiliate::class),
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph(1),
            'keywords' => $this->faker->randomElement(self::KEYWORDS),
            'type' => $this->faker->randomElement([AffiliateLinkTypes::TEXT, AffiliateLinkTypes::BANNER]),
            'url' => $this->faker->url,
            'image_source' => $this->faker->imageUrl(),
            'image_width' => $this->faker->randomElement(self::IMAGE_DIMENSIONS),
            'image_height' => $this->faker->randomElement(self::IMAGE_DIMENSIONS),
        ];
    }
}

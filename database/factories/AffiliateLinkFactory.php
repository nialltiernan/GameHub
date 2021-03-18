<?php

namespace Database\Factories;

use App\Enums\AffiliateLinkTypes;
use App\Enums\BannerShapes;
use App\Models\Affiliate;
use App\Models\AffiliateLink;
use Illuminate\Database\Eloquent\Factories\Factory;

class AffiliateLinkFactory extends Factory
{
    private const IMAGE_PROPERTIES = [
        ['width' => 300, 'height' => 300, 'shape' => BannerShapes::SQUARE_MEDIUM],
        ['width' => 50, 'height' => 300, 'shape' => BannerShapes::RECTANGLE_VERTICAL],
        ['width' => 300, 'height' => 50, 'shape' => BannerShapes::RECTANGLE_HORIZONTAL_MEDIUM],
    ];

    private const PROMOTIONS = [
        null,
        ['start' => '1-Jan-2020', 'end' => '31-Jan-2020'], // past
        ['start' => '1-Jan-2021', 'end' => '31-Dec-2021'], // present
        ['start' => '1-Jan-2022', 'end' => '31-Dec-2022'], // future
    ];

    private const KEYWORDS = [
        null,
        ['playstation 5', 'xbox one', 'computer games', 'console'],
        ['headphones', 'music', 'audio', 'gaming', 'headset'],
        ['pc games', 'computer games', 'action', 'strategy', 'simulator'],
        ['call of duty', 'action', 'multiplayer'],
        ['cyberpunk 2077', 'rpg', 'single player'],
        ['assassin\'s creed valhalla', 'action', 'role playing game', 'stealth'],
    ];

    protected $model = AffiliateLink::class;

    public function definition(): array
    {
        $linkType = $this->faker->randomElement([AffiliateLinkTypes::TEXT, AffiliateLinkTypes::BANNER]);
        $promotion = $this->getPromotion();

        return [
            'link_id' => $this->faker->numberBetween(),
            'affiliate_id' => self::factoryForModel(Affiliate::class),
            'keywords' => $this->faker->randomElement(self::KEYWORDS),
            'type' => $linkType,
            'url' => $this->faker->url,
            'image' => $linkType === AffiliateLinkTypes::BANNER ? $this->getImage() : null,
            'promotion_start' => $promotion['start'],
            'promotion_end' => $promotion['end'],
        ];
    }

    private function getImage(): array
    {
        $properties = $this->faker->randomElement(self::IMAGE_PROPERTIES);
        return  [
            'url' => $this->faker->imageUrl(),
            'width' => $properties['width'],
            'height' => $properties['height'],
            'shape' => $properties['shape'],
        ];
    }

    private function getPromotion(): array
    {
        $promotion = $this->faker->randomElement(self::PROMOTIONS);
        if (is_null($promotion)) {
            return ['start' => null, 'end' => null];
        }
        return  ['start' => $promotion['start'], 'end' => $promotion['end']];
    }
}

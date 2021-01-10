<?php
declare(strict_types=1);

namespace App\Services\Affiliate;

use App\Enums\AffiliateLinkTypes;
use App\Enums\BannerShapes;
use App\Models\AffiliateLink;

class GameBannerRetrieverDesktop
{
    private const ALLOWED_SHAPES = [
        BannerShapes::RECTANGLE_WIDE_SMALL,
        BannerShapes::RECTANGLE_WIDE_MEDIUM,
        BannerShapes::RECTANGLE_WIDE_LARGE
    ];

    public function execute(string $franchise): ?AffiliateLink
    {
        $franchiseLinks = AffiliateLink::where('type', AffiliateLinkTypes::BANNER)
            ->where('is_active', true)
            ->whereIn('image->shape', self::ALLOWED_SHAPES)
            ->whereJsonContains('keywords', $franchise)
            ->get();

        if ($franchiseLinks->isNotEmpty()) {
            return $franchiseLinks->random();
        }

        $otherLinks = AffiliateLink::where('type', AffiliateLinkTypes::BANNER)
            ->where('is_active', true)
            ->whereIn('image->shape', self::ALLOWED_SHAPES)
            ->get();

        if ($otherLinks->isNotEmpty()) {
            return $otherLinks->random();
        }

        return null;
    }
}

<?php

namespace App\Http\Livewire;

use App\Enums\BannerShapes;
use App\Models\AffiliateLink;
use App\Services\Affiliate\FranchiseExtractor;
use Livewire\Component;

class GameBannerMobile extends Component
{
    public string $title;
    public ?AffiliateLink $banner;

    public function loadBanner(FranchiseExtractor $franchiseExtractor)
    {
        $franchise = $franchiseExtractor->execute($this->title);

        $this->banner = AffiliateLink::banner(
            [
                BannerShapes::SQUARE_SMALL,
                BannerShapes::SQUARE_MEDIUM,
                BannerShapes::RECTANGLE_HORIZONTAL_SMALL,
                BannerShapes::RECTANGLE_HORIZONTAL_MEDIUM,
            ],
            $franchise
        );
    }

    public function render()
    {
        return view('livewire.game-banner-mobile');
    }
}

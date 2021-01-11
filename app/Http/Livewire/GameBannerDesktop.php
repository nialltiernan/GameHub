<?php

namespace App\Http\Livewire;

use App\Enums\BannerShapes;
use App\Models\AffiliateLink;
use App\Services\Affiliate\FranchiseExtractor;
use Livewire\Component;

class GameBannerDesktop extends Component
{

    public string $title;
    public ?AffiliateLink $banner;

    public function loadBanner(FranchiseExtractor $franchiseExtractor)
    {
        $franchise = $franchiseExtractor->execute($this->title);

        $this->banner = AffiliateLink::banner(
            $franchise,
            [BannerShapes::RECTANGLE_WIDE, BannerShapes::RECTANGLE_WIDE_LARGE]
        );
    }

    public function render()
    {
        return view('livewire.game-banner-desktop');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\AffiliateLink;
use App\Services\Affiliate\FranchiseExtractor;
use App\Services\Affiliate\GameBannerRetrieverDesktop;
use Livewire\Component;

class GameBannerDesktop extends Component
{

    public string $title;
    public ?AffiliateLink $banner;

    public function loadBanner(FranchiseExtractor $franchiseExtractor, GameBannerRetrieverDesktop $bannerRetriever)
    {
        $franchise = $franchiseExtractor->execute($this->title);
        $this->banner = $bannerRetriever->execute($franchise);
    }

    public function render()
    {
        return view('livewire.game-banner-desktop');
    }
}

<?php

namespace App\Http\Livewire;

use App\Enums\BannerShapes;
use App\Models\AffiliateLink;
use Livewire\Component;

class ListBannerDesktop extends Component
{
    public ?AffiliateLink $banner;

    public function loadBanner()
    {
        $this->banner = AffiliateLink::banner([BannerShapes::RECTANGLE_VERTICAL]);
    }

    public function render()
    {
        return view('livewire.list-banner-desktop');
    }
}

<?php

namespace App\Http\Livewire;

use App\Services\Affiliate\FranchiseExtractor;
use App\Services\Affiliate\FranchiseLinkRetriever;
use Livewire\Component;

class FranchiseLink extends Component
{

    public string $game;
    public string $link;

    public function loadFranchiseLink(
        FranchiseExtractor $franchiseExtractor,
        FranchiseLinkRetriever $franchiseLinkRetriever
    ) {
        $franchise = $franchiseExtractor->execute($this->game);
        $link = $franchiseLinkRetriever->execute($franchise);

        $this->link = is_null($link) ? '' : $link;
    }

    public function render()
    {
        return view('livewire.franchise-link');
    }
}

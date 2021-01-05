<?php

namespace App\Http\Livewire;

use App\Rawg\Filters\PaginationFilter;
use App\Services\Rawg\ClientRetriever;
use Livewire\Component;

class Achievements extends Component
{
    public int $gameId;
    public array $achievements = [];
    private const PAGE_SIZE = 8;

    public function loadAchievements(ClientRetriever $clientRetriever)
    {
        $client = $clientRetriever->execute();

        $paginationFilter = new PaginationFilter();
        $paginationFilter->setPageSize(self::PAGE_SIZE);

        $achievements = $client->games()->getAchievements($this->gameId, $paginationFilter)->getData()['results'];
        $this->achievements = $achievements;
    }

    public function render()
    {
        return view('livewire.achievements');
    }
}

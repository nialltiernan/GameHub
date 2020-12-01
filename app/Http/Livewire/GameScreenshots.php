<?php

namespace App\Http\Livewire;

use App\Rawg\Filters\OrderingFilter;
use App\Services\RAWG\ClientRetriever;
use Livewire\Component;

class GameScreenshots extends Component
{
    public int $gameId;
    public array $screenshots = [];

    public function loadScreenshots(ClientRetriever $clientRetriever)
    {
        $client = $clientRetriever->execute();
        $orderingFilter = new OrderingFilter();
        $data = $client->games()->getScreenshots($this->gameId, $orderingFilter)->getData();

        $this->screenshots = collect($data['results'])->pluck('image')->toArray();
    }

    public function render()
    {
        return view('livewire.game-screenshots');
    }
}

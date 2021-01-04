<?php

namespace App\Http\Livewire;

use App\Services\Rawg\ClientRetriever;
use Livewire\Component;

class Achievements extends Component
{
    public int $gameId;
    public array $achievements = [];

    public function loadAchievements(ClientRetriever $clientRetriever)
    {
        $client = $clientRetriever->execute();
        $achievements = $client->games()->getAchievements($this->gameId)->getData()['results'];

        $this->achievements = $achievements;
    }

    public function render()
    {
        return view('livewire.achievements');
    }
}

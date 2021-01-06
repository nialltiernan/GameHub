<?php

namespace App\Http\Livewire;

use App\Services\Rawg\ClientRetriever;
use App\View\Models\SimilarGamesViewModel;
use Livewire\Component;

class SimilarGames extends Component
{

    public int $gameId;
    public array $games = [];

    public function loadSimilarGames(ClientRetriever $clientRetriever)
    {
        $client = $clientRetriever->executeNoAuth();
        $data = $client->games()->getSuggested($this->gameId)->getData()['results'];
        $viewModel = new SimilarGamesViewModel($data);
        $this->games = $viewModel->data();
    }

    public function render()
    {
        return view('livewire.similar-games');
    }
}

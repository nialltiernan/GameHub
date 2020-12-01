<?php

namespace App\Http\Livewire;

use App\Rawg\ApiClient;
use App\Rawg\Config;
use App\Services\RAWG\ClientRetriever;
use App\ViewModels\SimilarGamesViewModel;
use Livewire\Component;

class SimilarGames extends Component
{

    public int $gameId;
    public array $games = [];

    public function loadSimilarGames(ClientRetriever $clientRetriever)
    {
        $config = new Config('');
        $client = new ApiClient($config);
        $data = $client->games()->getSuggested($this->gameId)->getData()['results'];
        $viewModel = new SimilarGamesViewModel($data);
        $this->games = $viewModel->data();
    }

    public function render()
    {
        return view('livewire.similar-games');
    }
}

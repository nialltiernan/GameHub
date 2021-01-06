<?php

namespace App\Http\Livewire;

use App\Models\GameList;
use App\Services\Rawg\ClientRetriever;
use App\View\Models\ListGameViewModel;
use Livewire\Component;

class ListGame extends Component
{
    public int $gameId;
    public int $listGameId;
    public array $game = [];
    public GameList $list;

    public function loadGames(ClientRetriever $clientRetriever)
    {
        $client = $clientRetriever->execute();
        $gameData = $client->games()->getGame($this->gameId)->getData();

        $viewModel = new ListGameViewModel($gameData);
        $viewModelData = $viewModel->data();

        $this->game = $viewModelData;
    }

    public function render()
    {
        return view('livewire.list-game');
    }
}

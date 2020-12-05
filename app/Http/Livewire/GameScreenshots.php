<?php

namespace App\Http\Livewire;

use App\Rawg\Filters\OrderingFilter;
use App\Services\RAWG\ClientRetriever;
use App\ViewModels\ScreenshotsViewModel;
use Livewire\Component;

class GameScreenshots extends Component
{
    public int $gameId;
    public array $screenshots = [];

    public function loadScreenshots(ClientRetriever $clientRetriever)
    {
        $client = $clientRetriever->execute();
        $orderingFilter = new OrderingFilter();
        $screenshots = $client->games()->getScreenshots($this->gameId, $orderingFilter)->getData()['results'];

        $viewModel = new ScreenshotsViewModel($screenshots);

        $this->screenshots = $viewModel->data();
    }

    public function render()
    {
        return view('livewire.game-screenshots');
    }
}

<?php

namespace App\Http\Livewire;

use App\Rawg\Filters\OrderingFilter;
use App\Services\Rawg\ClientRetriever;
use App\View\Models\ScreenshotsViewModel;
use Livewire\Component;

class Screenshots extends Component
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
        return view('livewire.screenshots');
    }
}

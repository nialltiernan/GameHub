<?php

namespace App\Http\Livewire;

use App\Enums\Platforms;
use App\Rawg\DateRange;
use App\Rawg\Filters\GamesFilter;
use App\Services\Cache\GetTimeToLife;
use App\Services\Rawg\ClientRetriever;
use App\ViewModels\GamesViewModel;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class HomePageGames extends Component
{
    public array $games = [];

    public function loadGames(ClientRetriever $clientRetriever)
    {
        $viewModelData = Cache::remember('home-page-games', GetTimeToLife::fetch(), function () use ($clientRetriever) {
            $client = $clientRetriever->execute();
            $filter = new GamesFilter();
            $filter
                ->setPageSize(9)
                ->setPlatforms([
                    Platforms::PC['id'],
                    Platforms::PLAYSTATION_4['id'],
                    Platforms::PLAYSTATION_5['id'],
                    Platforms::XBOX_ONE['id'],
                    Platforms::NINTENDO_SWITCH['id'],
                ])
                ->setDates([DateRange::create(now()->subtract(1, 'year'), now())])
                ->setOrdering('-rating');

            $gameData = $client->games()->getGames($filter)->getData()['results'];

            $viewModel = new GamesViewModel($gameData);
            return $viewModel->data();
        });

        $this->emitLivewireEvents($viewModelData);

        $this->games = $viewModelData;
    }

    /**
     * @param $viewModelData
     */
    private function emitLivewireEvents($viewModelData): void
    {
        collect($viewModelData)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('gameWithRatingAdded', [
                'slug' => $game['slug'],
                'rating' => $game['rating'],
            ]);
        });
    }

    public function render()
    {
        return view('livewire.home-page-games');
    }
}

<?php

namespace App\Http\Livewire;

use App\Rawg\Filters\GamesFilter;
use App\Services\Cache\GetTimeToLife;
use App\Services\Rawg\ClientRetriever;
use App\ViewModels\GamesViewModel;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class PlatformGames extends Component
{
    public array $games = [];
    public int $platformId;
    public string $order;
    public string $sort;
    public int $limit;

    public function loadGames(ClientRetriever $clientRetriever)
    {
        $viewModelData = Cache::remember($this->getCacheKey(), GetTimeToLife::fetch(), function () use ($clientRetriever) {
            $client = $clientRetriever->execute();
            $filter = new GamesFilter();
            $filter
                ->setPageSize($this->limit)
                ->setPlatforms([$this->platformId])
                ->setOrdering($this->getOrder());

            $gameData = $client->games()->getGames($filter)->getData()['results'];

            $viewModel = new GamesViewModel($gameData);
            return $viewModel->data();
        });

        collect($viewModelData)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('gameWithRatingAdded', [
                'slug' => $game['slug'],
                'rating' => $game['rating'],
            ]);
        });

        $this->games = $viewModelData;
    }

    private function getCacheKey(): string
    {
        return sprintf(
            'platform_%s_order_%s_limit_%s',
            $this->platformId,
            $this->order,
            $this->limit
        );
    }

    private function getOrder(): string
    {
        if ($this->order === 'desc') {
            return sprintf('-%s', $this->sort);
        }
        return $this->sort;
    }

    public function render()
    {
        return view('livewire.platform-games');
    }
}

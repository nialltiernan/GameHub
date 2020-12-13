<?php

namespace App\Http\Livewire;

use App\Rawg\Filters\GamesFilter;
use App\Services\Cache\GetTimeToLife;
use App\Services\RAWG\ClientRetriever;
use App\ViewModels\GamesViewModel;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class GenreGames extends Component
{
    public array $games = [];
    public int $genreId;
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
                ->setGenres([$this->genreId])
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
            $this->genreId,
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
        return view('livewire.genre-games');
    }
}

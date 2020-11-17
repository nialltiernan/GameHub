<?php

namespace App\Http\Livewire;

use App\Services\IGDB\GetApiHeaders;
use App\Services\IGDB\GetEndpoint;
use App\ViewModels\GamesViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PlatformGames extends Component
{

    public $games = [];
    public $platformId;
    public $sort;
    public $order;
    public $limit;

    private const ROUTE = 'games';

    public function loadGames(GetApiHeaders $headers)
    {
        $viewModelData = Cache::remember($this->getCacheKey(), 1440, function () use ($headers) {
            $gameData = Http::withHeaders($headers->fetch())
                ->withBody($this->getQuery(), 'raw')
                ->post(GetEndpoint::fetch(self::ROUTE))
                ->json();

            $viewModel = new GamesViewModel($gameData);
            return $viewModel->data();
        });

        $this->games = $viewModelData;
    }

    public function render()
    {
        return view('livewire.platform-games');
    }

    private function getCacheKey(): string
    {
        return sprintf(
            'platform_%s_sort_%s_order_%s_limit_%s',
            $this->platformId,
            $this->sort,
            $this->order,
            $this->limit
        );
    }

    private function getQuery(): string
    {
        if ($this->sort === 'rating') {
            return $this->getQuerySortedByRating();
        }
        return $this->getQuerySortedByAggregatedRating();
    }

    private function getQuerySortedByAggregatedRating()
    {
        return sprintf(
            'fields name, cover.url, aggregated_rating, platforms.abbreviation, slug;
            where platforms = (%s) & aggregated_rating != null;
            sort %s %s; 
            limit %s;',
            $this->platformId,
            $this->sort,
            $this->order,
            $this->limit
        );
    }

    private function getQuerySortedByRating()
    {
        return sprintf(
            'fields name, cover.url, rating, platforms.abbreviation, slug;
            where platforms = (%s) & rating != null;
            sort %s %s; 
            limit %s;',
            $this->platformId,
            $this->sort,
            $this->order,
            $this->limit
        );
    }
}

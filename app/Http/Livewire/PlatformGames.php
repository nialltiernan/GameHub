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

    private const ROUTE = 'games';
    private const QUERY = '
        fields name, cover.url, aggregated_rating, platforms.abbreviation, slug;
        where platforms = (%s) & aggregated_rating != null;
        sort aggregated_rating desc; 
        limit 12;';

    public function loadGames(GetApiHeaders $headers)
    {
        $viewModelData = Cache::remember($this->getCacheKey(), 1440, function () use ($headers) {
            $gameData = Http::withHeaders($headers->fetch())
                ->withBody(sprintf(self::QUERY, $this->platformId), 'raw')
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
        return sprintf('platform-games_%s', $this->platformId);
    }
}

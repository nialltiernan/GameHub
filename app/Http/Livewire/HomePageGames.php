<?php

namespace App\Http\Livewire;

use App\Services\IGDB\GetApiHeaders;
use App\Services\IGDB\GetEndpoint;
use App\ViewModels\GamesViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class HomePageGames extends Component
{
    private const ROUTE = 'games';
    private const QUERY = '
        fields name, cover.url, rating, platforms.abbreviation;
        where
            rating >= 80 &
            release_dates.date > %s &
            platforms = (48,49,5);
        sort rating desc; 
        limit 12;';

    public $games = [];

    public function loadGames(GetApiHeaders $headers)
    {
        $this->games = Cache::remember('home-page-games', 1440, function () use ($headers) {

            $gameData = Http::withHeaders($headers->fetch())
                ->withBody(sprintf(self::QUERY, Date::now()->subYear()->timestamp), 'raw')
                ->post(GetEndpoint::fetch(self::ROUTE))
                ->json();

            $viewModel = new GamesViewModel($gameData);
            return $viewModel->data();
        });
    }

    public function render()
    {
        return view('livewire.home-page-games');
    }
}

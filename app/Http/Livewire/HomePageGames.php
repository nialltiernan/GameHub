<?php

namespace App\Http\Livewire;

use App\Services\IGDB\GetApiHeaders;
use App\Services\IGDB\GetEndpoint;
use App\ViewModels\GameViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class HomePageGames extends Component
{
    private const ROUTE = 'games';
    private const QUERY = '
        fields name, cover.url, rating;
        where
            rating >= 90 &
            release_dates.date > 1546300800 &
            platforms = [48,49,6];
        sort rating desc; 
        limit 12;';

    public $games = [];

    public function loadGames(GetApiHeaders $headers)
    {
        $this->games = Cache::remember('home-page-games', 1440, function () use ($headers) {

            $gameData = Http::withHeaders($headers->fetch())
                ->withBody(self::QUERY, 'raw')
                ->post(GetEndpoint::fetch(self::ROUTE))
                ->json();

            $viewModel = new GameViewModel($gameData);
            return $viewModel->games();
        });
    }

    public function render()
    {
        return view('livewire.home-page-games');
    }
}

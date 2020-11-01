<?php

namespace App\Http\Livewire;

use App\Services\IGDB\GetApiHeaders;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class HomeGames extends Component
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
        $data = Cache::remember('home-games', 1440, function () use ($headers) {
            return Http::withHeaders($headers->fetch())
                ->withBody(self::QUERY, 'raw')
                ->post($this->getRoute())
                ->json();
        });

        $this->games = $this->formatGames($data);
    }

    public function render()
    {
        return view('livewire.home-games');
    }

    private function formatGames($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('t_thumb', 't_720p', $game['cover']['url']),
            ]);
        })->toArray();
    }

    private function getRoute(): string
    {
        return sprintf('%s%s', config('services.igdb.api_endpoint'), self::ROUTE);
    }
}

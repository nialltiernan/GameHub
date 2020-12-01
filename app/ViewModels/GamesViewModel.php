<?php

namespace App\ViewModels;

use Illuminate\Contracts\Support\Arrayable;
use Spatie\ViewModels\ViewModel;

class GamesViewModel extends ViewModel implements Arrayable
{

    private array $games;

    public function __construct($games)
    {
        $this->games = $games;
    }

    public function data()
    {
        return collect($this->games)->map(function ($game) {
            return collect($game)->merge([
                'image_url' => $game['background_image'],
                'rating' => $this->getRating($game),
                'platforms' => $this->getPlatforms($game)
            ]);
        })->toArray();
    }

    private function getPlatforms($game)
    {
        $platforms = [];
        foreach ($game['platforms'] as $platform) {
            $platforms[$platform['platform']['id']] = $platform['platform']['name'];
        }

        return $platforms;
    }

    private function getRating($game)
    {
        return ($game['rating'] / 5) * 100;
    }
}

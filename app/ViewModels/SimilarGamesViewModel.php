<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class SimilarGamesViewModel extends ViewModel
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
                'platforms' => self::getPlatforms($game)
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
}

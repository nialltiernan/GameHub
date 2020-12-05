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

    public function data(): array
    {
        return collect($this->games)->map(function ($game) {
            return collect($game)->merge([
                'image_url' => $this->getCroppedImageUrl($game),
                'rating' => $this->getRating($game),
                'platforms' => $this->getPlatforms($game)
            ]);
        })->toArray();
    }

    private function getCroppedImageUrl($game)
    {
        return str_replace('/media/games/','/media/crop/600/400/games/', $game['background_image']);
    }

    private function getPlatforms($game): array
    {
        $platforms = [];
        foreach ($game['platforms'] as $platform) {
            $platforms[$platform['platform']['id']] = $platform['platform']['name'];
        }

        return $platforms;
    }

    private function getRating($game): float
    {
        return ($game['rating'] / 5) * 100;
    }
}

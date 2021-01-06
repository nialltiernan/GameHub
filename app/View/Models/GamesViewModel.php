<?php

namespace App\View\Models;

use App\Services\Rawg\UrlConverter;
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
                'image_url' => $this->getImageUrl($game),
                'rating' => $this->getRating($game),
                'platforms' => $this->getPlatforms($game)
            ]);
        })->toArray();
    }

    private function getImageUrl($game): string
    {
        return $game['background_image'] ?
            UrlConverter::cropImage600x400($game['background_image']) : '/images/game-not-found.png';
    }

    private function getPlatforms($game): array
    {
        $platforms = [];
        foreach ($game['platforms'] as $platform) {
            $platforms[$platform['platform']['name']] = $platform['platform']['id'];
        }

        return $platforms;
    }

    private function getRating($game): float
    {
        return ($game['rating'] / 5) * 100;
    }
}

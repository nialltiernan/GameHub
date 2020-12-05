<?php

namespace App\ViewModels;

use App\Services\RAWG\UrlConverter;
use Spatie\ViewModels\ViewModel;

class SimilarGamesViewModel extends ViewModel
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
                'image_url' => UrlConverter::cropImage600x400($game['background_image']),
                'platforms' => self::getPlatforms($game)
            ]);
        })->toArray();
    }

    private function getPlatforms($game): array
    {
        $platforms = [];
        foreach ($game['platforms'] as $platform) {
            $platforms[$platform['platform']['id']] = $platform['platform']['name'];
        }

        return $platforms;
    }
}

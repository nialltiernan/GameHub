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

    public function data(): array
    {
        return collect($this->games)->map(function ($game) {
            return collect($game)->merge([
                'image_url' => $this->getCroppedImageUrl($game),
                'platforms' => self::getPlatforms($game)
            ]);
        })->toArray();
    }

    private function getCroppedImageUrl($game): string
    {
        $url = str_replace('/media/games/','/media/crop/600/400/games/', $game['background_image']);
        return str_replace('/media/screenshots/', '/media/crop/600/400/screenshots/', $url);
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

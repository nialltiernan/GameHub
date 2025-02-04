<?php

namespace App\View\Models;

use Spatie\ViewModels\ViewModel;

class GameViewModel extends ViewModel
{

    private const DESCRIPTION_PREVIEW_LENGTH = 450;

    private array $game;

    public function __construct($game)
    {
        $this->game = $game;
    }

    public function data(): array
    {
        return collect($this->game)->merge([
            'rating' => $this->getRating(),
            'publisher' => $this->getPublisher(),
            'genres' => $this->getGenres(),
            'platforms' => $this->getPlatforms(),
            'social_links' => $this->getSocialLinks(),
            'description' => $this->getDescription()
        ])->toArray();
    }

    private function getRating(): float
    {
        return $this->game['metacritic'] / 100;
    }

    private function getPlatforms(): array
    {
        $platforms = [];
        foreach ($this->game['platforms'] as $platform) {
            $platforms[$platform['platform']['id']] = $platform['platform']['name'];
        }

        return $platforms;
    }

    private function getPublisher(): string
    {
        return collect($this->game['publishers'])->pluck('name')->implode(', ');
    }

    private function getGenres(): array
    {
        $genres = [];
        foreach ($this->game['genres'] as $genre) {
            $genres[$genre['id']] = $genre['name'];
        }
        return $genres;
    }

    private function getSocialLinks(): array
    {
        $links = [];
        if (isset($this->game['clip']['video'])) {
            $links['youtube'] = $this->getYouTubeLink();
        }
        if ($this->game['reddit_url']) {
            $links['reddit'] = $this->game['reddit_url'];
        }
        if ($this->game['metacritic_url']) {
            $links['metacritic'] = $this->game['metacritic_url'];
        }
        return $links;
    }

    private function getYouTubeLink(): string
    {
        return sprintf('https://www.youtube.com/watch?v=%s', $this->game['clip']['video']);
    }

    private function getDescription(): array
    {
        $preview = substr($this->game['description_raw'], 0, self::DESCRIPTION_PREVIEW_LENGTH);
        return ['preview' => $preview, 'full' => $this->game['description_raw']];
    }
}

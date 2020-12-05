<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class GameViewModel extends ViewModel
{

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
            'youtube_link' => $this->getYouTubeLink()
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

    private function getGenres(): string
    {
        return isset($this->game['genres']) ? collect($this->game['genres'])->pluck('name')->implode(', ') : '';
    }

    private function getSocialLinks(): array
    {
        $links = [];
        if (isset($this->game['reddit_url'])) {
            $links['reddit'] = $this->game['reddit_url'];
        }
        if (isset($this->game['metacritic_url'])) {
            $links['metacritic'] = $this->game['metacritic_url'];
        }
        return $links;
    }

    private function getYouTubeLink(): string
    {
        return isset($this->game['video']) ? sprintf('https://www.youtube.com/watch?v=%s', $this->game['video']) : '';
    }
}

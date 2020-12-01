<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class GameViewModel extends ViewModel
{

    
    private $game;

    public function __construct($game)
    {
        $this->game = $game;
    }

    public function data()
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

    private function getRating()
    {
        return $this->game['metacritic'] / 100;
    }


    private function getPlatforms()
    {
        $platforms = [];
        foreach ($this->game['platforms'] as $platform) {
            $platforms[$platform['platform']['id']] = $platform['platform']['name'];
        }

        return $platforms;
    }

    private function getPublisher()
    {
        return collect($this->game['publishers'])->pluck('name')->implode(', ');
    }

    private function getGenres(): string
    {
        return isset($this->game['genres']) ? collect($this->game['genres'])->pluck('name')->implode(', ') : '';
    }

    private function getSocialLinks()
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

    private function getYouTubeLink()
    {
        return isset($this->game['video']) ? sprintf('https://www.youtube.com/watch?v=%s', $this->game['video']) : '';
    }
}

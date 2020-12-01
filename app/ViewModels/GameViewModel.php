<?php

namespace App\ViewModels;

use Illuminate\Support\Str;
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
            'platforms' => self::getPlatforms($this->game),
            'screenshots' => $this->getScreenshots(),
            'similar_games' => $this->getSimilarGames(),
            'social_links' => $this->getSocialLinks(),
            'youtube_link' => $this->getYouTubeLink()
        ])->toArray();
    }

    private function getRating()
    {
        return $this->game['metacritic'] / 100;
    }

    private static function formatRating($game)
    {
        return isset($game['rating']) ? $game['rating'] / 100 : '';
    }

    private static function getPlatforms($game)
    {
        return collect($game['platforms'])->pluck('platform.name')->implode(', ');
    }

    private function getPublisher()
    {
        return collect($this->game['publishers'])->pluck('name')->implode(', ');
    }

    private function getGenres(): string
    {
        return isset($this->game['genres']) ? collect($this->game['genres'])->pluck('name')->implode(', ') : '';
    }

    private function getScreenshots()
    {
        return isset($this->game['screenshots']) ?
            collect($this->game['screenshots'])->map(function ($screenshot) {
                return collect($screenshot)->merge([
                    'url' => Str::replaceFirst('t_thumb', 't_screenshot_med', $screenshot['url']),
                ]);
            }) : [];
    }

    private function getSimilarGames()
    {
        return isset($this->game['similar_games']) ?
            collect($this->game['similar_games'])->map(function ($similarGame) {
                return collect($similarGame)->merge([
                    'url' => self::convertUrlThumbnailToBigCover($similarGame),
                    'rating' => self::formatRating($similarGame),
                    'platforms' => self::getPlatforms($similarGame)
                ]);
            }) : [];
    }

    private function getSocialLinks()
    {
        $links = [];
        if (isset($this->game['website'])) {
            $links['home'] = $this->game['website'];
        }
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

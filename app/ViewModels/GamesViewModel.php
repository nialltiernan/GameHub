<?php

namespace App\ViewModels;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;

class GamesViewModel extends ViewModel implements Arrayable
{

    private $games;

    public function __construct($games)
    {
        $this->games = $games;
    }

    public function data()
    {
        return collect($this->games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => $this->getCoverImageUrl($game),
                'rating' => $this->getRating($game),
                'platforms' => $this->getPlatforms($game)
            ]);
        })->toArray();
    }

    /**
     * @param $game
     * @return string
     */
    private function getCoverImageUrl($game): string
    {
        return isset($game['cover']['url']) ? Str::replaceFirst('t_thumb', 't_cover_big', $game['cover']['url']) : '/images/game-not-found.png';
    }

    /**
     * @param $game
     * @return float|string
     */
    private function getRating($game)
    {
        return isset($game['rating']) ? round($game['rating'], 2) : '';
    }

    /**
     * @param $game
     * @return array|string
     */
    private function getPlatforms($game)
    {
        return isset($game['platforms']) ? collect($game['platforms'])->pluck('abbreviation')->implode(', ') : '';
    }
}

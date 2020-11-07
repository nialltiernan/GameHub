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
                'coverImageUrl' => Str::replaceFirst('t_thumb', 't_720p', $game['cover']['url']),
                'rating' => round($game['rating'], 2),
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', ')
            ]);
        })->toArray();
    }
}

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
            'coverImageUrl' => Str::replaceFirst('t_thumb', 't_cover_big', $this->game['cover']['url']),
            'rating' => isset($this->game['rating']) ? round($this->game['rating'], 2) . '%' : '',
            'publisher' => $this->game['involved_companies'][0]['company']['name'],
            'genres' => collect($this->game['genres'])->pluck('name')->implode(', '),
            'platforms' => collect($this->game['platforms'])->pluck('abbreviation')->implode(', '),
            'screenshots' => collect($this->game['screenshots'])->map(function ($screenshot) {
                return collect($screenshot)->merge([
                    'url' => Str::replaceFirst('t_thumb', 't_720p', $screenshot['url']),
                ]);
            }),
            'similar_games' => collect($this->game['similar_games'])->map(function ($similarGame){
                return collect($similarGame)->merge([
                    'url' => Str::replaceFirst('t_thumb', 't_cover_big', $similarGame['cover']['url']),
                    'rating' => isset($similarGame['rating']) ? round($similarGame['rating'], 2) . '%' : '',
                    'platforms' => collect($similarGame['platforms'])->pluck('abbreviation')->implode(', ')
                ]);
            })
        ])->toArray();
    }
}

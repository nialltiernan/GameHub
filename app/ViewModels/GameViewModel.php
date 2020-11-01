<?php

namespace App\ViewModels;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;

class GameViewModel extends ViewModel implements Arrayable
{
    private $games;

    public function __construct($games)
    {
        $this->games = $games;
    }

    public function games()
    {
        return collect($this->games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('t_thumb', 't_720p', $game['cover']['url']),
            ]);
        })->toArray();
    }
}

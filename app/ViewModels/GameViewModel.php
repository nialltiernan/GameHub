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
            'coverImageUrl' => Str::replaceFirst('t_thumb', 't_720p', $this->game['cover']['url']),
        ])->toArray();
    }
}

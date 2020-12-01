<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class SimilarGamesViewModel extends ViewModel
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
                'url' => $game['background_image'],
            ]);
        })->toArray();
    }

}

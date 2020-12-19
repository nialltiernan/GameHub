<?php

namespace App\ViewModels;

use App\Services\Rawg\UrlConverter;
use Spatie\ViewModels\ViewModel;

class ListGameViewModel extends ViewModel
{

    private array $game;

    public function __construct($game)
    {
        $this->game = $game;
    }

    public function data(): array
    {
        return collect($this->game)->merge([
            'image_url' => UrlConverter::resizeImage420($this->game['background_image']),
        ])->toArray();
    }
}

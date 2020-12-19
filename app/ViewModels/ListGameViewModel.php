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
        if (isset($this->game['redirect'])) {
            return [];
        }
        return collect($this->game)->merge([
            'image_url' => $this->getImageUrl()
        ])->toArray();
    }

    private function getImageUrl(): string
    {
        return isset($this->game['background_image']) ?
            UrlConverter::resizeImage420($this->game['background_image']) : '/images/game-not-found.png';
    }
}

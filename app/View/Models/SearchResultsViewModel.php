<?php

namespace App\View\Models;

use App\Services\Rawg\UrlConverter;
use Spatie\ViewModels\ViewModel;

class SearchResultsViewModel extends ViewModel
{
    private array $games;

    public function __construct($games)
    {
        $this->games = $games;
    }

    public function data(): array
    {
        return collect($this->games)->map(function ($game) {
            return collect($game)->merge([
                'image_url' => UrlConverter::resizeImage420($game['background_image']),
            ]);
        })->toArray();
    }
}

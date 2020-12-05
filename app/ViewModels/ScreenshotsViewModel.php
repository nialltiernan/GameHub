<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class ScreenshotsViewModel extends ViewModel
{
    private array $screenshots;

    public function __construct($screenshots)
    {
        $this->screenshots = $screenshots;
    }

    public function data(): array
    {
        return collect($this->screenshots)->map(function ($item) {
            return str_replace('/media/screenshots/','/media/crop/600/400/screenshots/', $item['image']);
        })->toArray();
    }
}

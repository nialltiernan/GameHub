<?php

namespace App\View\Models;

use App\Services\Rawg\UrlConverter;
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
            return UrlConverter::cropImage600x400($item['image']);
        })->toArray();
    }
}

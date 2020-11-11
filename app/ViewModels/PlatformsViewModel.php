<?php

namespace App\ViewModels;

use App\Enums\Platforms;
use Spatie\ViewModels\ViewModel;

class PlatformsViewModel extends ViewModel
{

    public function getPlatforms()
    {
        $collection = collect(array_flip(Platforms::toArray()));
        return $collection->transform(function ($item) {
            return str_replace('_', ' ', $item);
        });
    }

    public function getSelectedPlatform($id)
    {
        $enumKey = array_flip(Platforms::toArray())[$id];
        return str_replace('_', ' ', $enumKey);
    }
}

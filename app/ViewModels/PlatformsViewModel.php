<?php

namespace App\ViewModels;

use App\Enums\Platforms;
use Spatie\ViewModels\ViewModel;

class PlatformsViewModel extends ViewModel
{

    public function getPlatforms()
    {
        return array_flip(Platforms::toArray());
    }

    public function getSelectedPlatform($id)
    {
        return array_flip(Platforms::toArray())[$id];
    }
}

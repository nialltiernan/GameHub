<?php

namespace App\ViewModels;

use App\Enums\Platforms;
use Spatie\ViewModels\ViewModel;

class PlatformsViewModel extends ViewModel
{

    public function getPlatforms(): array
    {
        $platforms = [];
        foreach (Platforms::values() as $enum) {
            $platform = $enum->getValue();
            $platforms[$platform['id']] = $platform['display_name'];
        }
        return $platforms;
    }
}

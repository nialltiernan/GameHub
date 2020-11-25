<?php
declare(strict_types=1);

namespace App\Services\Cache;

use Illuminate\Support\Facades\App;

class GetTimeToLife
{
    public static function fetch(): int
    {
        return App::environment('local') ? 1 : 1440;
    }
}

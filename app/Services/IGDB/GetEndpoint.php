<?php
declare(strict_types=1);

namespace App\Services\IGDB;

class GetEndpoint
{
    static public function fetch($route)
    {
        return sprintf('%s%s', config('services.igdb.api_endpoint'), $route);
    }
}

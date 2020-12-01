<?php
declare(strict_types=1);

namespace App\Services\RAWG;

use App\Rawg\ApiClient;
use App\Rawg\Config;

class ClientRetriever
{

    public function execute()
    {
        $config = new Config(config('services.rawg.api_key'));
        return new ApiClient($config);
    }
}

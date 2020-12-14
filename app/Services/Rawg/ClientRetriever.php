<?php
declare(strict_types=1);

namespace App\Services\Rawg;

use App\Rawg\ApiClient;
use App\Rawg\Config;

class ClientRetriever
{
    public function execute(): ApiClient
    {
        $config = new Config(config('services.rawg.api_key'));
        return new ApiClient($config);
    }

    public function executeNoAuth(): ApiClient
    {
        $config = new Config('');
        return new ApiClient($config);
    }
}

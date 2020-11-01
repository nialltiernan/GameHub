<?php
declare(strict_types=1);

namespace App\Services\IGDB;

class GetApiHeaders
{
    public function fetch()
    {
        return [
            'Content-Type' => 'application/json',
            'Client-ID' => config('services.igdb.client_id'),
            'Authorization' => config('services.igdb.authorization'),
        ];
    }
}

<?php

namespace App\Rawg\Resources;

use App\Rawg\ApiException;
use App\Rawg\Filters\OrderingFilter;
use App\Rawg\Response;

/**
 * Class StoresResource
 * @package Rawg\Resources
 */
class StoresResource extends Resource
{
    /**
     * @param OrderingFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getStores(OrderingFilter $filter): Response
    {
        return $this->get("/stores", $filter->toArray());
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getStore(int $id): Response
    {
        return $this->get("/stores/$id");
    }
}

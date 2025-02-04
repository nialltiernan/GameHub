<?php

namespace App\Rawg\Resources;

use App\Rawg\ApiException;
use App\Rawg\Filters\OrderingFilter;
use App\Rawg\Response;

/**
 * Class PlatformsResource
 * @package Rawg\Resources
 */
class PlatformsResource extends Resource
{
    /**
     * @param OrderingFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getPlatforms(OrderingFilter $filter): Response
    {
        return $this->get("/platforms", $filter->toArray());
    }

    /**
     * @param OrderingFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getPlatformsParents(OrderingFilter $filter): Response
    {
        return $this->get("/platforms/lists/parents", $filter->toArray());
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getPlatform(int $id): Response
    {
        return $this->get("/platforms/$id");
    }

}

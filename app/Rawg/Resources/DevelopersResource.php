<?php

namespace App\Rawg\Resources;

use App\Rawg\ApiException;
use App\Rawg\Filters\PaginationFilter;
use App\Rawg\Response;

/**
 * Class DevelopersResource
 * @package Rawg\Resources
 */
class DevelopersResource extends Resource
{
    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getDeveloper(int $id): Response
    {
        return $this->get("/developers/$id");
    }

    /**
     * @param PaginationFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getDevelopers(PaginationFilter $filter): Response
    {
        return $this->get("/developers", $filter->toArray());
    }
}

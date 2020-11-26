<?php

namespace App\Rawg\Resources;

use App\Rawg\ApiException;
use App\Rawg\Filters\PaginationFilter;
use App\Rawg\Response;

/**
 * Class CreatorsResource
 * @package Rawg\Resources
 */
class CreatorsResource extends Resource
{
    /**
     * @param PaginationFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getRoles(PaginationFilter $filter): Response
    {
        return $this->get("/creator-roles", $filter->toArray());
    }

    /**
     * @param PaginationFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getCreators(PaginationFilter $filter): Response
    {
        return $this->get("/creators", $filter->toArray());
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getCreator(int $id): Response
    {
        return $this->get("/creators/$id");
    }
}

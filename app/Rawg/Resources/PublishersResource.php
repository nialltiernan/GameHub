<?php

namespace App\Rawg\Resources;

use App\Rawg\ApiException;
use App\Rawg\Filters\PaginationFilter;
use App\Rawg\Response;

/**
 * Class PublishersResource
 * @package Rawg\Resources
 */
class PublishersResource extends Resource
{
    /**
     * @param PaginationFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getPublishers(PaginationFilter $filter): Response
    {
        return $this->get("/publishers", $filter->toArray());
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getPublisher(int $id): Response
    {
        return $this->get("/publishers/$id");
    }
}

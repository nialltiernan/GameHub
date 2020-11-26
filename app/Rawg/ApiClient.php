<?php

namespace App\Rawg;

use GuzzleHttp\Client as HttpClient;
use App\Rawg\Resources\CreatorsResource;
use App\Rawg\Resources\DevelopersResource;
use App\Rawg\Resources\GamesResource;
use App\Rawg\Resources\GenresResource;
use App\Rawg\Resources\PlatformsResource;
use App\Rawg\Resources\PublishersResource;
use App\Rawg\Resources\StoresResource;
use App\Rawg\Resources\TagsResource;

class ApiClient
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var Config
     */
    protected $config;

    /**
     * ApiClient constructor.
     * @param Config $cfg
     * @param HttpClient|null $httpClient
     */
    public function __construct(Config $cfg, HttpClient $httpClient = null)
    {
        $this->config = $cfg;
        $this->httpClient = $httpClient ?? new HttpClient();
    }

    /**
     * @return CreatorsResource
     */
    public function creators(): CreatorsResource
    {
        return new CreatorsResource($this->config, $this->httpClient);
    }

    /**
     * @return DevelopersResource
     */
    public function developers(): DevelopersResource
    {
        return new DevelopersResource($this->config, $this->httpClient);
    }

    /**
     * @return GamesResource
     */
    public function games(): GamesResource
    {
        return new GamesResource($this->config, $this->httpClient);
    }

    /**
     * @return GenresResource
     */
    public function genres(): GenresResource
    {
        return new GenresResource($this->config, $this->httpClient);
    }

    /**
     * @return PlatformsResource
     */
    public function platforms(): PlatformsResource
    {
        return new PlatformsResource($this->config, $this->httpClient);
    }

    /**
     * @return PublishersResource
     */
    public function publishers(): PublishersResource
    {
        return new PublishersResource($this->config, $this->httpClient);
    }

    /**
     * @return StoresResource
     */
    public function stores(): StoresResource
    {
        return new StoresResource($this->config, $this->httpClient);
    }

    /**
     * @return TagsResource
     */
    public function tags(): TagsResource
    {
        return new TagsResource($this->config, $this->httpClient);
    }
}

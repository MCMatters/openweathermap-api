<?php

declare(strict_types=1);

namespace McMatters\OpenWeatherMapApi;

use McMatters\OpenWeatherMapApi\Resources\Current;
use McMatters\OpenWeatherMapApi\Resources\Forecast;
use McMatters\OpenWeatherMapApi\Resources\Location;

/**
 * Class OpenWeatherMapClient
 *
 * @package McMatters\OpenWeatherMapApi
 */
class OpenWeatherMapClient
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var array
     */
    protected $resources = [];

    /**
     * OpenWeatherMapClient constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return \McMatters\OpenWeatherMapApi\Resources\Current
     */
    public function current(): Current
    {
        return $this->resource(Current::class);
    }

    /**
     * @return \McMatters\OpenWeatherMapApi\Resources\Forecast
     */
    public function forecast(): Forecast
    {
        return $this->resource(Forecast::class);
    }

    /**
     * @return \McMatters\OpenWeatherMapApi\Resources\Location
     */
    public function location(): Location
    {
        return $this->resource(Location::class);
    }

    /**
     * @param string $class
     *
     * @return mixed
     */
    protected function resource(string $class)
    {
        if (!isset($this->resources[$class])) {
            $this->resources[$class] = new $class($this->apiKey);
        }

        return $this->resources[$class];
    }
}

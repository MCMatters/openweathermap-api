<?php

declare(strict_types=1);

namespace McMatters\OpenWeatherMapApi\Resources;

use McMatters\OpenWeatherMapApi\Resources\Traits\WeatherTrait;

/**
 * Class Forecast
 *
 * @package McMatters\OpenWeatherMapApi\Resources
 */
class Forecast extends Resource
{
    use WeatherTrait {
        byCityId as protected byCityIdTrait;
        byCityName as protected byCityNameTrait;
        byCoordinates as protected byCoordinatesTrait;
        byZipCode as protected byZipCodeTrait;
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function byCityId(int $id): array
    {
        return $this->byCityIdTrait('forecast', $id);
    }

    /**
     * @param string $name
     *
     * @return array
     */
    public function byCityName(string $name): array
    {
        return $this->byCityNameTrait('forecast', $name);
    }

    /**
     * @param float $latitude
     * @param float $longitude
     *
     * @return array
     */
    public function byCoordinates(float $latitude, float $longitude): array
    {
        return $this->byCoordinatesTrait('forecast', $latitude, $longitude);
    }

    /**
     * @param int|string $zipCode
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    public function byZipCode($zipCode): array
    {
        return $this->byZipCodeTrait('forecast', $zipCode);
    }
}

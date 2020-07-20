<?php

declare(strict_types=1);

namespace McMatters\OpenWeatherMapApi\Resources\Traits;

use InvalidArgumentException;

use function is_numeric, is_string;

/**
 * Trait WeatherTrait
 *
 * @package McMatters\OpenWeatherMapApi\Resources\Traits
 */
trait WeatherTrait
{
    /**
     * @param string $uri
     * @param string $name
     *
     * @return array
     */
    protected function byCityName(string $uri, string $name): array
    {
        return $this->httpClient->withQuery(['q' => $name])->get($uri)->json();
    }

    /**
     * @param string $uri
     * @param int $id
     *
     * @return array
     */
    protected function byCityId(string $uri, int $id): array
    {
        return $this->httpClient->withQuery(['id' => $id])->get($uri)->json();
    }

    /**
     * @param string $uri
     * @param float $latitude
     * @param float $longitude
     *
     * @return array
     */
    protected function byCoordinates(
        string $uri,
        float $latitude,
        float $longitude
    ): array {
        return $this->httpClient
            ->withQuery(['lat' => $latitude, 'lon' => $longitude])
            ->get($uri)
            ->json();
    }

    /**
     * @param string $uri
     * @param int|string $zipCode
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    protected function byZipCode(string $uri, $zipCode): array
    {
        if (!is_numeric($zipCode) && !is_string($zipCode)) {
            throw new InvalidArgumentException(
                'zipCode must be as integer or string'
            );
        }

        return $this->httpClient
            ->withQuery(['zip' => $zipCode])
            ->get($uri)
            ->json();
    }
}

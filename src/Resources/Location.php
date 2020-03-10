<?php

declare(strict_types=1);

namespace McMatters\OpenWeatherMapApi\Resources;

/**
 * Class Location
 *
 * @package McMatters\OpenWeatherMapApi\Resources
 */
class Location extends Resource
{
    /**
     * @param string $query
     * @param string $type
     *
     * @return array
     */
    public function find(string $query, string $type = 'accurate'): array
    {
        return $this->httpClient
            ->withQuery(['q' => $query, 'type' => $type])
            ->get('find')
            ->json();
    }
}

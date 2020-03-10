<?php

declare(strict_types=1);

namespace McMatters\OpenWeatherMapApi\Resources;

use McMatters\Ticl\Client;

/**
 * Class AbstractResource
 *
 * @package McMatters\OpenWeatherMapApi\Resources
 */
abstract class Resource
{
    /**
     * @var \McMatters\Ticl\Client
     */
    protected $httpClient;

    /**
     * AbstractResource constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->httpClient = new Client([
            'base_uri' => 'https://api.openweathermap.org/data/2.5',
            'query' => [
                'APPID' => $apiKey,
            ],
        ]);
    }
}

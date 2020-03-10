<?php

declare(strict_types=1);

namespace McMatters\OpenWeatherMapApi\Tests\Traits;

use McMatters\OpenWeatherMapApi\OpenWeatherMapClient;

/**
 * Class ClientTrait
 *
 * @package McMatters\OpenWeatherMapApi\Tests\Traits
 */
trait ClientTrait
{
    /**
     * @return \McMatters\OpenWeatherMapApi\OpenWeatherMapClient
     */
    protected function getClient(): OpenWeatherMapClient
    {
        static $client;

        if (null === $client) {
            $client = new OpenWeatherMapClient(getenv('OPENWEATHERMAP_API_KEY'));
        }

        return $client;
    }
}

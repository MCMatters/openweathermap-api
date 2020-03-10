<?php

declare(strict_types=1);

namespace McMatters\OpenWeatherMapApi\Tests;

use McMatters\OpenWeatherMapApi\Tests\Traits\ClientTrait;
use McMatters\OpenWeatherMapApi\Tests\Traits\WeatherResponseTrait;
use PHPUnit\Framework\TestCase;

/**
 * Class ForecastTest
 *
 * @package McMatters\OpenWeatherMapApi\Tests
 */
class ForecastTest extends TestCase
{
    use ClientTrait;
    use WeatherResponseTrait;

    /**
     * @return void
     */
    public function testByCityId()
    {
        // 687700 is city "Zaporizhia"
        $this->assertResponseData(
            $this->getClient()->forecast()->byCityId(687700)
        );
    }

    /**
     * @return void
     */
    public function testByCityName()
    {
        $this->assertResponseData(
            $this->getClient()->forecast()->byCityName('Zaporizhia')
        );
    }

    /**
     * @return void
     */
    public function testByCoordinates()
    {
        $this->assertResponseData(
            $this->getClient()->forecast()->byCoordinates(47.82, 35.18)
        );
    }

    /**
     * @return void
     */
    public function testByZipCode()
    {
        $this->assertResponseData(
            $this->getClient()->forecast()->byZipCode('69000')
        );

        $this->assertResponseData(
            $this->getClient()->forecast()->byZipCode(69000)
        );
    }
}

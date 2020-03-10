<?php

declare(strict_types=1);

namespace McMatters\OpenWeatherMapApi\Tests;

use McMatters\OpenWeatherMapApi\Tests\Traits\ClientTrait;
use McMatters\OpenWeatherMapApi\Tests\Traits\WeatherResponseTrait;
use PHPUnit\Framework\TestCase;

/**
 * Class CurrentTest
 *
 * @package McMatters\OpenWeatherMapApi\Tests
 */
class CurrentTest extends TestCase
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
            $this->getClient()->current()->byCityId(687700)
        );
    }

    /**
     * @return void
     */
    public function testByCityName()
    {
        $this->assertResponseData(
            $this->getClient()->current()->byCityName('Zaporizhia')
        );
    }

    /**
     * @return void
     */
    public function testByCoordinates()
    {
        $this->assertResponseData(
            $this->getClient()->current()->byCoordinates(47.82, 35.18)
        );
    }

    /**
     * @return void
     */
    public function testByZipCode()
    {
        $this->assertResponseData(
            $this->getClient()->current()->byZipCode('69000')
        );
    }
}

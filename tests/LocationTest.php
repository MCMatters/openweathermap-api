<?php

declare(strict_types=1);

namespace McMatters\OpenWeatherMapApi\Tests;

use McMatters\OpenWeatherMapApi\Tests\Traits\ClientTrait;
use PHPUnit\Framework\TestCase;

use const null;

/**
 * Class LocationTest
 *
 * @package McMatters\OpenWeatherMapApi\Tests
 */
class LocationTest extends TestCase
{
    use ClientTrait;

    /**
     * @return void
     */
    public function testFind()
    {
        $data = $this->getClient()->location()->find('Zaporizhia');

        $this->assertNotEmpty($data);
        $this->assertSame(200, (int) ($data['cod'] ?? null));
        $this->assertSame('accurate', $data['message'] ?? null);
        $this->assertNotEmpty($data['list'] ?? []);
    }
}

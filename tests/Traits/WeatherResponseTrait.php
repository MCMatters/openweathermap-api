<?php

declare(strict_types=1);

namespace McMatters\OpenWeatherMapApi\Tests\Traits;

use function number_format;

use const null;

/**
 * Class WeatherResponseTrait
 *
 * @package McMatters\OpenWeatherMapApi\Tests\Traits
 */
trait WeatherResponseTrait
{
    /**
     * @param array $data
     *
     * @return void
     */
    protected function assertResponseData(array $data): void
    {
        $this->assertNotEmpty($data);
        $this->assertSame(200, (int) ($data['cod'] ?? null));
        $this->assertSame('Zaporizhia', $data['name'] ?? $data['city']['name'] ?? null);
        $this->assertSame(687700, (int) ($data['id'] ?? $data['city']['id'] ?? null));

        $this->assertSame(35.18, $this->normalizeFloatResponseValue(
            $data['coord']['lon'] ?? $data['city']['coord']['lon'] ?? null
        ));

        $this->assertSame(47.82, $this->normalizeFloatResponseValue(
            $data['coord']['lat'] ?? $data['city']['coord']['lat'] ?? null
        ));
    }

    /**
     * @param float|null $value
     *
     * @return float|null
     */
    protected function normalizeFloatResponseValue(?float $value): ?float
    {
        if (null === $value) {
            return null;
        }

        return (float) number_format($value, 2, '.', '');
    }
}

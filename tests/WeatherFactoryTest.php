<?php
/**
 * <pre>
 * Created by:  15.09.2018 17:43
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */
namespace Fry256\HexletWorkshop\Tests;

use Fry256\HexletWorkshop\WeatherFactory;
use Fry256\HexletWorkshop\MetaWeather;
use Fry256\HexletWorkshop\OpenWeatherMap;
use \PHPUnit\Framework\TestCase;


class WeatherFactoryTest extends TestCase
{
    public function testRequestData()
    {
        $this->assertInstanceOf(
            MetaWeather::class,
            WeatherFactory::createWeatherService('metaweather')
        );
        $this->assertInstanceOf(
            OpenWeatherMap::class,
            WeatherFactory::createWeatherService('openweather')
        );
    }
}
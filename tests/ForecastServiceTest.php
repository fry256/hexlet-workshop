<?php
/**
 * <pre>
 * Created by:  15.09.2018 17:43
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */
namespace Fry256\HexletWorkshop\Tests;

use Fry256\HexletWorkshop\AnotherService;
use Fry256\HexletWorkshop\ForecastService;
use Fry256\HexletWorkshop\MetaWeather;
use Fry256\HexletWorkshop\OpenWeatherMap;
use \PHPUnit\Framework\TestCase;


class ForecastServiceTest extends TestCase
{
    public function testRequestData()
    {
        /*$this->assertInstanceOf(
            MetaWeather::class,
            new ForecastService('metaweather')
        );
        $this->assertInstanceOf(
            OpenWeatherMap::class,
            new ForecastService('openweather')
        );
        $this->assertInstanceOf(
            AnotherService::class,
            new ForecastService(AnotherService::class)
        );*/
    }
}
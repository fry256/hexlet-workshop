<?php
/**
 * <pre>
 * Created by:  15.09.2018 17:00
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

class WeatherFactory
{
    private static $services = [
        'metaweather' => MetaWeather::class,
        'openweather' => OpenWeatherMap::class,
    ];
    /**
     * @param $serviceName
     * @return MetaWeather|OpenWeatherMap
     *
     * @throw InvalidArgumentException
     */
    public static function createWeatherService($serviceName)
    {
        if (!isset(self::$services[$serviceName])) {
            throw new \InvalidArgumentException('Service not supported');
        }
        return new self::$services[$serviceName];
    }

    public function getForecast(string $city, string $service) :WeatherInfo
    {
        $service = self::createWeatherService($service);
        return $service->getInfo($city);
    }
}
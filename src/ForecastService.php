<?php
/**
 * <pre>
 * Created by:  15.09.2018 17:00
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

class ForecastService
{
    /**
     * @var IWeatherService
     */
    private $currentService;

    private static $services = [
        'metaweather' => MetaWeather::class,
        'openweather' => OpenWeatherMap::class,
    ];

    public function __construct($serviceName)
    {
        try{
            $service = new $serviceName;
        }catch (\Error $exception){
            if (!isset(self::$services[$serviceName])) {
                throw new \InvalidArgumentException('Service not supported');
            }
            $service = new self::$services[$serviceName];
        }

        $this->currentService = $service;
    }

    /**
     * @param null $service
     * @return IWeatherService
     */
    private function getService($service = null) :IWeatherService
    {
        if(!is_null($service)){
            return $service;
        }
        return $this->currentService;
    }

    /**
     * @param string $city
     * @param string|IWeatherService $service
     * @return WeatherInfo
     */
    public function getForecast(string $city, $service = null) :WeatherInfo
    {
        $service = $this->getService($service);
        return $service->getInfo($city);
    }
}
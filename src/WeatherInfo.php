<?php
/**
 * <pre>
 * Created by:  16.09.2018 7:57
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */
namespace Fry256\HexletWorkshop;

class WeatherInfo
{
    private $temperature;
    private $airPressure;
    private $humidity;
    private $windSpeed;

    public function __construct(
        string $temperature,
        string $airPressure,
        string $humidity,
        string $windSpeed
    )
    {
        $this->temperature = $temperature;
        $this->airPressure = $airPressure;
        $this->humidity = $humidity;
        $this->windSpeed = $windSpeed;
    }

    /**
     * @return string
     */
    public function getTemperature(): string
    {
        return $this->temperature;
    }

    /**
     * @return string
     */
    public function getAirPressure(): string
    {
        return $this->airPressure;
    }

    /**
     * @return string
     */
    public function getHumidity(): string
    {
        return $this->humidity;
    }

    /**
     * @return string
     */
    public function getWindSpeed(): string
    {
        return $this->windSpeed;
    }
}
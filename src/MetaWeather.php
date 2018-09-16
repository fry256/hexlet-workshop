<?php
/**
 * <pre>
 * Created by:  15.09.2018 16:54
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class MetaWeather
{
    const URL = 'https://www.metaweather.com/api/location';
    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @param ClientInterface|null $client
     */
    public function __construct(?ClientInterface $client = null)
    {
        $this->httpClient = $client ?? new Client();
    }

    public function getInfo(string $city): WeatherInfo
    {
        $cityInfo = $this->httpClient->request('GET', self::URL . '/search/' . '?query=' . $city);
        $city = \json_decode($cityInfo->getBody(), true)[0];
        $response = $this->httpClient->request('GET', self::URL . '/location/' . $city['woeid'] . '/');

        return $this->parse($response->getBody());
    }

    /**
     * @param string $json
     * @return WeatherInfo
     */
    private function parse(string $json): WeatherInfo
    {
        $weatherAll = \json_decode($json, true);

        $weatherMain = $weatherAll['consolidated_weather'][0];

        return new WeatherInfo(
            $weatherMain['the_temp'],
            $weatherMain['air_pressure'],
            $weatherMain['humidity'],
            $weatherMain['wind_speed']
        );
    }
}
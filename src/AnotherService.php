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

class AnotherService implements IWeatherService
{
    const URL = 'https://www.some-weather-site.com/api/';
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
        $response = $this->httpClient->request('GET', self::URL . '/' . $city);

        return $this->parse($response->getBody());
    }

    /**
     * @param string $json
     * @return WeatherInfo
     */
    private function parse(string $json): WeatherInfo
    {
        $weather = \json_decode($json, true);

        return new WeatherInfo(
            $weather['temp'],
            $weather['pressure'],
            $weather['humidity'],
            $weather['wind']
        );
    }
}
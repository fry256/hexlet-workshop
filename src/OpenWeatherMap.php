<?php
/**
 * <pre>
 * Created by:  15.09.2018 16:51
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class OpenWeatherMap
{
    const URL = 'http://openweathermap.org/data/2.5/weather';
    const API_KEY = 'b6907d289e10d714a6e88b30761fae22';

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

    /**
     * @param string $city
     * @return WeatherInfo
     */
    public function getInfo(string $city) :WeatherInfo
    {
        $response = $this->httpClient->request('GET', self::URL . 'q=' . $city . '&appid=' . self::API_KEY);
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
            $weather['main']['temp'],
            $weather['main']['pressure'],
            $weather['main']['humidity'],
            $weather['wind']['speed']
        );
    }
}
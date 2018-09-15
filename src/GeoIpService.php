<?php
/**
 * <pre>
 * Created by:  15.09.2018 10:57
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class GeoIpService
{
    const URL = 'http://ip-api.com/json/';

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
     * @param $ip
     * @return array
     */
    public function getData($ip): array
    {
        $response = $this->httpClient->request('GET', self::URL . $ip);
        return $this->parse($response->getBody());
    }
    /**
     * @param string $json
     * @return array
     */
    private function parse(string $json): array
    {
        return \json_decode($json, true);
    }
}
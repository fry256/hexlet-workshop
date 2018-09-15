<?php
/**
 * <pre>
 * Created by:  15.09.2018 9:07
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */
namespace Fry256\HexletWorkshop\Tests;

use \Fry256\HexletWorkshop\GeoIpService;
use \GuzzleHttp\ClientInterface;
use \Psr\Http\Message\ResponseInterface;
use \PHPUnit\Framework\TestCase;


class GeoIpServiceTest extends TestCase
{
    private $geoIp;
    private $expectedData;

    public function setUp()
    {
        $this->expectedData = '{"as":"AS1586 DoD Network Information Center","city":"Sierra Vista (Fort Huachuca)","country":"United States","countryCode":"US","isp":"","lat":31.5552,"lon":-110.35,"org":"","query":"134.234.3.2","region":"","regionName":"Arizona","status":"success","timezone":"America/Phoenix","zip":"85613"}';
        $this->geoIp = new GeoIpService($this->createHttpClient($this->expectedData));
    }

    public function testRequestData()
    {

        $ipApiData = $this->geoIp->getData('134.234.3.2');
        $this->assertEquals(
            json_decode($this->expectedData, true),
            $ipApiData
        );
    }

    private function createHttpClient(string $body): ClientInterface
    {
        $httpResponse = $this->createMock(ResponseInterface::class);
        $httpResponse
            ->method('getBody')
            ->willReturn($body);

        $httpClient = $this->createMock(ClientInterface::class);
        $httpClient
            ->method('request')
            ->willReturn($httpResponse);

        return $httpClient;
    }
}
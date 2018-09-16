<?php
/**
 * <pre>
 * Created by:  15.09.2018 17:43
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */
namespace Fry256\HexletWorkshop\Tests;

use Fry256\HexletWorkshop\ForecastService;
use \GuzzleHttp\ClientInterface;
use \Psr\Http\Message\ResponseInterface;
use \PHPUnit\Framework\TestCase;


class ForecastServiceTest extends TestCase
{
    private $weather;

    public function setUp()
    {
        $body = '{"coord":{"lon":-0.13,"lat":51.51},"weather":[{"id":803,"main":"Clouds","description":"broken clouds","icon":"04d"}],"base":"stations","main":{"temp":21.81,"pressure":1017,"humidity":46,"temp_min":20,"temp_max":23},"visibility":10000,"wind":{"speed":6.7,"deg":210,"gust":12.3},"clouds":{"all":68},"dt":1537102200,"sys":{"type":1,"id":5091,"message":0.0072,"country":"GB","sunrise":1537076259,"sunset":1537121504},"id":2643743,"name":"London","cod":200}';
        $this->weather = new ForecastService(
            'openweather',
            ['httpClient' => $this->createHttpClient($body)]
        );
    }

    public function testRequestData()
    {
        $weaterInfo = $this->weather->getForecast('London');
        $this->assertEquals(
            '21.81',
            $weaterInfo->getTemperature()
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
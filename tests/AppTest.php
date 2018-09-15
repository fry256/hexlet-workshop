<?php
/**
 * <pre>
 * Created by:  15.09.2018 9:07
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */
namespace Fry256\HexletWorkshop\Tests;

use \PHPUnit\Framework\TestCase;
use Fry256\HexletWorkshop\{
    App, GeoIpService, GeoData
};

class AppTest extends TestCase
{
    public function testSend()
    {
        $app = new App(
            new GeoIpService(
                new GeoData()
            )
        );
        $this->assertEquals(
            'Sierra Vista (Fort Huachuca)',
            $app->getByIp('134.234.3.2')->getCity()
        );
    }
}
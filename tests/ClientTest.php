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
use \Fry256\HexletWorkshop\{Client, Response, Request};

class ClientTestTest extends TestCase
{
    public function testSend()
    {
        $client = new Client(
            new Request('http://ip-api.com', '/json/134.234.3.2'),
            new Response()
        );
        $this->assertEquals(
            json_decode('{"as":"AS1586 DoD Network Information Center","city":"Sierra Vista (Fort Huachuca)","country":"United States","countryCode":"US","isp":"","lat":31.5552,"lon":-110.35,"org":"","query":"134.234.3.2","region":"","regionName":"Arizona","status":"success","timezone":"America/Phoenix","zip":"85613"}'),
            $client->send()
        );
    }
}
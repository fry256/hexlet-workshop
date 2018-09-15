<?php
/**
 * <pre>
 * Created by:  15.09.2018 10:34
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

class GeoIpService implements IServices
{
    const URL = 'http://ip-api.com/json/';
    private $resultData;
    private $parser;

    public function __construct(IGeoData $resultData, IParser $parser)
    {
        $this->resultData = $resultData;
        $this->parser = $parser;
    }

    public function getByIp(string $ip): IGeoData
    {
        $resp = $this->query($ip);
        $data = $this->parser->parse($resp);
        $this->resultData->setCity($data['city']);

        return $this->resultData;
    }
    private function query(string $ip)
    {
        return file_get_contents(self::URL . $ip);
    }
}
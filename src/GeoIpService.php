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

    public function __construct(IGeoData $resultData)
    {
        $this->resultData = $resultData;
    }

    public function getByIp(string $ip): IGeoData
    {
        $resp = $this->query(['ip' => $ip]);
        $data = $this->decode($resp);
        $this->resultData->setCity($data['city']);

        return $this->resultData;
    }
    private function query(array $params)
    {
        $query = array_key_exists('ip', $params) ? $params['ip'] : '';
        return file_get_contents(self::URL . $query);
    }
    private function decode($rowData)
    {
        return json_decode($rowData, true);
    }
}
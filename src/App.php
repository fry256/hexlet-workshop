<?php
/**
 * <pre>
 * Created by:  15.09.2018 10:57
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

class App
{
    private $service;

    public function __construct(IServices $service)
    {
        $this->service = $service;
    }

    public function getByIp(string $ip): IGeoData
    {
        return $this->service->getByIp($ip);
    }
}
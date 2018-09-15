<?php
/**
 * <pre>
 * Created by:  15.09.2018 5:53
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

class Request implements IRequest
{
    private $uri;
    private $host;

    public function __construct(string $host, string $uri)
    {
        $this->setHost($host);
        $this->setUri($uri);
    }

    private function setUri($uri)
    {
        $this->uri = $uri;
    }

    public function getUri() :string
    {
        return $this->uri;
    }

    private function setHost($host)
    {
        $this->host = $host;
    }

    public function getHost() :string
    {
        return $this->host;
    }

    public function __toString()
    {
        return $this->getHost() . $this->getUri();
    }
}
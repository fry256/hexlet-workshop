<?php
/**
 * <pre>
 * Created by:  15.09.2018 5:54
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

class Response implements IResponse
{
    private $body;
    private $statusCode;
    private $reasonPhrase;

    public function __construct(int $statusCode = 400, array $body = [], string $reasonPhrase = 'Bad request')
    {

        $this->body = $body;
        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
        /*$this->setBody($body);
        $this->setReasonPhrase($reasonPhrase);
        $this->setStatusCode($statusCode);*/
    }

    public function getBody() :array
    {
        return $this->body;
    }

    public function setBody(array $body) :IResponse
    {
        return new static($this->getStatusCode(), $body, $this->getReasonPhrase());
    }

    public function getStatusCode() :int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode) :IResponse
    {
        return new static($statusCode, $this->getBody(), $this->getReasonPhrase());
    }

    public function getReasonPhrase() :string
    {
        return $this->reasonPhrase;
    }

    public function setReasonPhrase(string $reasonPhrase) :IResponse
    {
        return new static($this->getStatusCode(), $this->getBody(), $reasonPhrase);
    }
}
<?php
/**
 * <pre>
 * Created by:  15.09.2018 5:50
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

interface IResponse
{
    public function getBody() :array;
    public function setBody(array $body) :IResponse;
    public function getStatusCode() :int;
    public function setStatusCode(int $statusCode) :IResponse;
    public function getReasonPhrase() :string;
    public function setReasonPhrase(string $reasonPhrase) :IResponse;
}
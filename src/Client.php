<?php
/**
 * <pre>
 * Created by:  15.09.2018 5:32
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

class Client implements IClient
{
    private $request;
    private $response;

    public function __construct(IRequest $request, IResponse $response)
    {
        $this->setRequest($request);
        $this->setResponse($response);
    }

    public function send() :IResponse
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, (string) $this->getRequest());
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 2000);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        if(curl_errno($ch))
        {
            $response = $this->getResponse()
                ->setStatusCode(500)
                ->setBody([
                    'code' => curl_errno($ch),
                    'message' => curl_error($ch)
                ])
                ->setReasonPhrase('Internal Server Error');
        }else{
            $regex = '/^\s*HTTP\s*\/\s*\d*\.\d*\s*(?P<statusCode>\d*)\s(?P<reasonPhrase>.*)\r\n/';
            preg_match($regex , $header, $matches);
            $responseStatus = [];
            foreach (['statusCode', 'reasonPhrase'] as $part) {
                if (isset($matches[$part])) {
                    $responseStatus[$part] = $matches[$part];
                }
            }

            $response =  $this->getResponse()
                ->setStatusCode($responseStatus['statusCode'])
                ->setBody(json_decode($body, true))
                ->setReasonPhrase($responseStatus['reasonPhrase']);
        }

        curl_close($ch);

        return $response;
    }

    private function setRequest($request)
    {
        $this->request = $request;
    }

    private function getRequest() :IRequest
    {
        return $this->request;
    }

    private function setResponse($response)
    {
        $this->response = $response;
    }

    private function getResponse() :IResponse
    {
        return $this->response;
    }
}
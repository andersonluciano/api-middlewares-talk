<?php

namespace App\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\JsonResponse;

class FormatMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        /** @var JsonResponse $response */
        $response = $delegate->process($request, $delegate);

        $data = $response->getPayload();
        $accept = $request->getHeader("Accept");
        switch ($accept[0]) {
            case "application/xml":

                $xml = new \SimpleXMLElement('<root/>');
                $this->arrayToXml($data, $xml);

                $response = new Response();
                $response->withHeader("Content-type", "application/xml");
                $response->getBody()->write($xml->asXML());

                return $response;
                break;
            case "application/json":
                return $response;
            default :
                throw new \Exception("Formato de resposta não aceito", 406);
                break;
        }
    }

    public function arrayToXml($array, &$xml)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (is_int($key)) {
                    $key = "e";
                }
                $label = $xml->addChild($key);
                $this->arrayToXml($value, $label);
            } else {
                $xml->addChild($key, $value);
            }
        }
    }
}

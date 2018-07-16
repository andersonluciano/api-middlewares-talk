<?php

namespace App\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class FormatMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {

        $requestResume = [
            "method" => $request->getMethod(),
            "body" => $request->getParsedBody(),
            "query" => $request->getQueryParams(),
            "headers" => $request->getHeaders(),
        ];

        /** @var JsonResponse $response */
        $response = $delegate->process($request, $delegate);

        
        return $response;
    }
}
